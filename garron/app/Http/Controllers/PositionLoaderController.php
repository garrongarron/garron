<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Position;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;


class PositionLoaderController extends Controller
{
    static public $MOBILE = 'mobile';
    static public $DESKOTP = 'desktop';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ITResources.widget.positionloader');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        /*

        //*[@id="bpr-guid-9171430"]

        */
    }

    static public function searchOnLinkedin($position){
        return true;
        try{
            //Cache::forget(PositionLoaderController::$MOBILE.'|'.$url);
            $positionLoader = new self;
            $keywords = str_slug($position);
            $location = str_slug('Argentina');
            if(Cache::has($keywords) ){
                //return true;
            }
            $url = 'https://www.linkedin.com/jobs/search/?keywords='.$keywords.'&location='.$location;
            $html = $positionLoader->getHtmlMobileCache($url);
            $xpath = $positionLoader->getXpathObject($html);
            $as = $xpath->query('//*[@id="app-container"]/section[2]/ol/li[*]/a');
            foreach ($as as $a) {
                $href = explode('?', $a->getAttribute('href'))[0];
                $positionLoader->loadFromUrl($href);
                usleep(500000);
            }
            //exit();
            Cache::put($keywords, true, 60*24*7);
        }catch(\Exception $e){
            dd($e);
        }
    }



     private function search($request){
        $keywords = str_slug($request->input('keywords'));
        //$location = str_slug($request->input('location'));
        $location = str_slug('Argentina');
        $url = 'https://www.linkedin.com/jobs/search/?keywords='.$keywords.'&location='.$location;

        $html = $this->getHtml($url, 1);
        echo $html;exit();
        $data = $this->getSearchResult($html);
        foreach ($data as $key => $value) {
            $url = explode('?',$value[0]);
            //var_dump($url[0]);
            $htmlPosition = $this->getHtml($url[0], 2);//echo $htmlPosition;exit();
            $dataPosition = $this->getDataPosition($htmlPosition);
            //var_dump($dataPosition);
            //exit();
        }
       // dd($data);
       // exit();
    }
    private function validateURL($url){
        if(strpos($url, 'https://www.')===0){
            return true;
        }
        return false;
    }

    public function loadFromUrl($urlLong){
        $url = $urlLong;
        if(!$this->validateURL($url)){
            $msg = 'Debe comenzar con  "https://www."';
            Session::flash('message', $msg);
            throw new \Exception('<b>Error:</b> '.$msg .' => '.$urlLong, 1);
        }


        $desktop = $this->dataFromDesktop($url);
        $mobile = $this->dataFromMobile($url);
        //var_dump($desktop);
        //var_dump($mobile);
       

        $position = new Position();
        # id, user_id, 
        $position->user_id = 1;
        $position->title = $mobile['title']; 
        $position->title_slug = str_slug($mobile['title']);
        $position->description = $mobile['description'].'<a href="'.$url.'" target="_blank">ver más</a>'; 
        $position->type = $mobile['type'];
        $position->salary = 'N/A';
        //$position->mandatory_requirements = 'asdasd';
        //$position->desiderable_requirements = 'asdasd';
        $position->industry = (!isset($mobile['industry'][0]))?$mobile['industry']:$mobile['industry'][0];
        $position->location = $desktop['location']; 
        if(isset($desktop['when'])){
            $position->created_at = Carbon::createFromTimestamp(substr($desktop['when'], 0,10)); 
        }
        $position->save();

        //$resultado = Position::find($position->id);

        //var_dump($resultado);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->input('url'))){
            $urlLong = $request->input('url');

            $this->loadFromUrl($urlLong);
            return 'ok';
        } else {
            $this->search($request);
        }
        return $result;
    }

    private function json2xml($jsonString){
        $array = json_decode($jsonString, true);
        return $this->array2xml($array, false);
    }

    private function array2xml($array, $xml = false){
        if($xml === false){
            $xml = new \SimpleXMLElement('<result/>');
        }
        foreach($array as $key => $value){
            if(is_array($value)){
                $this->array2xml($value, $xml->addChild($key));
            } else {
                @$xml->addChild($key, $value);
            }
        }
        return $xml->asXML();
    }

    private function dataFromMobile($url){
        $html = $this->getHtmlMobileCache($url);
        return $this->getDataPosition($html);
    }
    private function dataFromDesktop($url){
        $html = $this->getHtmlDesktopCache($url);
        $xpath = $this->getXpathObject($html);
        $result = $xpath->query('/html/body/code');

        $dataFromDesktop = [];
        foreach ($result as $value) {
            try{
                if(strpos($value->nodeValue, '"companyDetails"')){
                    //echo $value->nodeValue;
                    $data = json_decode($value->nodeValue, 1);
                    /*echo $this->json2xml($value->nodeValue);
                    exit();*/
                    if(isset($data['listedAt']))
                    $dataFromDesktop['when'] = $data['listedAt'];
                    $dataFromDesktop['title'] = $data['title'];
                    $dataFromDesktop['position'] = explode(':',$data['entityUrn'])[3];
                    $dataFromDesktop['description'] = $data['description']['text'];
                    $dataFromDesktop['location'] = $data['formattedLocation'];
                    if(isset($data['companyDetails']['com.linkedin.voyager.jobs.JobPostingCompany']['company'])){
                        $companyName = $data['companyDetails']['com.linkedin.voyager.jobs.JobPostingCompany']['company'];
                        $dataFromDesktop['companyDetails'] = $companyName ;
                        $dataFromDesktop['entityUrn'] = $data['companyDetails']['com.linkedin.voyager.jobs.JobPostingCompany']['companyResolutionResult']['entityUrn'];
                        $dataFromDesktop['name'] = $data['companyDetails']['com.linkedin.voyager.jobs.JobPostingCompany']['companyResolutionResult']['name'];
                        if(isset($data['companyDetails']['com.linkedin.voyager.jobs.JobPostingCompany']['companyResolutionResult']['logo'])){
                            $logo = $data['companyDetails']['com.linkedin.voyager.jobs.JobPostingCompany']['companyResolutionResult']['logo'];
                            $dataFromDesktop['logo'] = $logo['image']['com.linkedin.common.VectorImage']['rootUrl'];
                            $dataFromDesktop['artifacts'] = $logo['image']['com.linkedin.common.VectorImage']['artifacts'][0]['fileIdentifyingUrlPathSegment'];

                        }
                    }
                }
            }catch(Exception $e){

            }
        }
        
        return $dataFromDesktop;
    }

   

    private function getDataPosition($html){
        $doc = new \DOMDocument();
        $searchPage = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8"); 
        $node = @$doc->loadHTML($searchPage);
        $xpath = new \DOMXPath($doc);

        $dataMobilePosition = [];

        $title = $xpath->query('//*[@id="app-container"]/section/div/dl/dt')[0]->nodeValue;
        $dataMobilePosition['title'] = $title;
        
        $domElement = $xpath->query('//*[@id="app-container"]/section/section[*]/div')[0];//[0]->nodeValue;

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
        $divs = $xpath->query('//*[@class="meta-data"]/div', $domElement);
        foreach ($divs as  $div) {
            $div->removeAttribute('class');
        }
        $ps = $xpath->query('//*[@class="meta-data"]/p', $domElement);
        foreach ($ps as  $p) {
            $string = $p->nodeValue;
            $b = $doc->createElement('b', $string.'');
            $p->parentNode->replaceChild($b, $p);
        }
        $as = $xpath->query('//*[@id="app-container"]/section/section[*]/div/*/a', $domElement);
        foreach ($as as  $a) {
            $a->parentNode->removeChild($a);
        }
        $selecion = $xpath->query('//*[@class="meta-data"]', $domElement);
///////////////////////////////////////////////////////
///////////////////////////////////////////////////////
        $description = $doc->saveHTML($domElement);
        //echo $description;
        //var_dump($description);exit();
        $dataMobilePosition['description'] = $description;

        $type = $xpath->query('//*[@id="app-container"]/section/section[1]/div/div/div[2]/div[3]')[0]->nodeValue;
        $dataMobilePosition['type'] = $type;



        $industry = $xpath->query('//*[@id="app-container"]/section/section[1]/div/div/div[2]/div[2]')[0]->nodeValue;
        $industry=array_map('trim',explode(',', $industry));
        $dataMobilePosition['industry'] = $industry;



        $when = $xpath->query('//*[@id="app-container"]/section/div/dl/dd[2]/span')[0]->nodeValue;
        $dataMobilePosition['when'] = $when;


//        $img = $xpath->query('//*[@id="company-logo"]/img')[0]->attributes[4]->value;
//        $dataMobilePosition['img'] = $img;
        //echo '<img src="'.$img.'">';


        $companyName = $xpath->query('//*[@id="company-name"]')[0]->nodeValue;
        $dataMobilePosition['companyName'] = $companyName;
        return $dataMobilePosition;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getXpathObject($html){
        $doc = new \DOMDocument();
        $searchPage = mb_convert_encoding($html, 'HTML-ENTITIES', "UTF-8"); 
        $node = @$doc->loadHTML($searchPage);

        return new \DOMXPath($doc);
    }

    private function getSearchResult($html){
        $xpath = $this->getXpathObject($html);
        $result = $xpath->query('//*[@id="app-container"]/section[*]/ol/li[*]/a');
        $data = [];
        foreach ($result as $a) {
            $dt = $xpath->query('div/dl/dt', $a);
            array_push($data, [$a->attributes[0]->value,$dt[0]->nodeValue]);
        }
        return $data;
    }


    private function getHtmlDesktopCache($url){
        $key = PositionLoaderController::$DESKOTP.'|'.$url;
        if(!Cache::has($key) ){
            Cache::put($key, $this->getLinkedinDesktop($url), 60*24);
        }
        return Cache::get($key);
    }
    private function getHtmlMobileCache($url){
        $key = PositionLoaderController::$MOBILE.'|'.$url;
        if(!Cache::has($key) ){
            Cache::put($key, $this->getLinkedinMobile($url), 60*24);
        }
        $data = Cache::get($key);
        return $data;
    }


    //CACHE LINKEDIN
    /*public function getHtmlDesktop($url = null, $flag = null){
        $conditions = [['url', '=', $url], ['type', '=', PositionLoaderController::$DESKOTP]];
        $htmlData =  DB::table('cache_linkedin')->where($conditions)->first();
        if($htmlData == null){
            $html =  $this->getLinkedinDesktop($url);
            DB::table('cache_linkedin')->insert([
            'url' => $url,
            'html' => $html,
            'type' => PositionLoaderController::$DESKOTP,
            ]);
        } else {
            $html = $htmlData->html;
        }
        
        return $html;
    }

    public function getHtmlMobile($url = null, $flag = null){
        $conditions = [['url', '=', $url], ['type', '=', PositionLoaderController::$MOBILE]];
        $htmlData =  DB::table('cache_linkedin')->where($conditions)->first();
        if($htmlData == null){
            $html =  $this->getLinkedinMobile($url);
            DB::table('cache_linkedin')->insert([
            'url' => $url,
            'html' => $html,
            'type' => PositionLoaderController::$MOBILE,
            ]);
        } else {
            $html = $htmlData->html;
        }
        //dd($html);
        return $html;
    }*/
       
    public function getLinkedinDesktop($url = null, $flag = null){

        //curl_setopt($ch, CURLOPT_URL, "https://www.linkedin.com/jobs/view/677911329/");
        //curl_setopt($ch, CURLOPT_URL, "https://www.linkedin.com/jobs/view/693629350/");
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = "Authority: www.linkedin.com";
        $headers[] = "Cache-Control: max-age=0";
        $headers[] = "Upgrade-Insecure-Requests: 1";
        $headers[] = "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36";
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        $headers[] = "Accept-Encoding: gzip, deflate, br";
        $headers[] = "Accept-Language: en-US,en;q=0.9,es-AR;q=0.8,es;q=0.7";
        $headers[] = "Cookie: bcookie=\"v=2&f54a8038-9778-4559-856d-748956b1b8e4\"; bscookie=\"v=1&20180509125030c7f5055f-68a4-40c4-8905-80cec90651f9AQH_qk6V7i7_gcoqrFZAkLZBtffYZ_T0\"; _ga=GA1.2.519358548.1525876155; _guid=d4a2f34a-1438-4582-af35-93f02f5cb826; visit=\"v=1&M\"; VID=V_2018_06_10_17_1480; AMCV_14215E3D5995C57C0A495C55%40AdobeOrg=-1891778711%7CMCIDTS%7C17694%7CMCMID%7C22979185144893096923474866673775122091%7CMCAAMLH-1529282293%7C4%7CMCAAMB-1529282294%7CRKhpRz8krg2tLO6pguXWp5olkAcUniQYPHaMWWgdJ3xzPWQmdj0y%7CMCCIDH%7C1161261362%7CMCOPTOUT-1528684693s%7CNONE%7CMCSYNCSOP%7C411-17701%7CvVersion%7C2.4.0; ELOQUA=GUID=86B810CF5F44470C8595207A51E2B90F; li_oatml=AQHDqWBVi7h2NwAAAWP9ag8WwsA_9PoqG8nRIEA318pR_pwq2mR-TF-9ewAmLnOLtItLKQt8Jq-CRytHzKbALyXHb2pO7IKc; __utma=226841088.519358548.1525876155.1530104510.1530104510.1; __utmz=226841088.1530104510.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); pushPermState=default; JSESSIONID=\"ajax:2989934994519573996\"; leo_auth_token=\"GST:ZLKKzIkgZUVkm30u0X0Enc0QYZwkC9fFKSTo9-KoJQwlQT0nM6OnHA:1531147134:585f375bfaf33c9aca4b9e8e8213184a476ad294\"; sl=\"v=1&Ayt7c\"; li_at=AQEDASI8vzgBZXtUAAABZH97KBoAAAFko4esGk4AQxCcMfQWShSCFITptnRcC0LxchhNf43GlJ1ATb0wS5VgALcDuG23pIka2USqEP96gvzeRQ3RMTLA0SIN_zno3pfYXGQXMuiy4MfkfaJBXX7M2teh; liap=true; lang=v=2&lang=es-es; _lipt=CwEAAAFkf3vejZ98CFKH9736KvgdU2aoi3HNDYstxx3bpUgr9as-PuOQvhws7laqLy5Lp1YcMQkZSAT4-TDmsQZS25dax7U5Hnbo1JGXLI3S7MUWeW2oRsV87Ik4kn9n3c0rd3U6gTM-itulCo4xZjlaHoZnaQ_FgzqlKvw_tzZszulyKxy7Z1Zjdb4-N2zJuKLpTq6niXddGaeKqnR25xp0zMPrXHJrOYT2apNyLO1NlF4ZmywMacHb1G7b2n9eUOTXUWcu-61U2vuETzS8RdPdfHz0zDipG8eI7pEjPZX9v5RHXpWU8EYUm0-upyZJPnfSBGqZyb9l5s9B2ztZt-u8dnqQmU7ouYi-60cq0nbL7Rc_aW7LVu45; lidc=\"b=SGST00:g=5:u=1:i=1531147205:t=1531233605:s=AQHtlFpFuTFnT6j_1VguXoDLg5emjTFI\"";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
    
        return $result;
    }
    private function getLinkedinMobile($url, $flag = null){
        ////////////////////////////////////////////////////////////////////
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        //curl_setopt($ch, CURLOPT_URL, "https://www.linkedin.com/jobs/view/693629350/");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = "Accept-Encoding: gzip, deflate, br";
        $headers[] = "Accept-Language: en-US,en;q=0.9";
        $headers[] = "Upgrade-Insecure-Requests: 1";
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Mobile Safari/537.36";
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        $headers[] = "Cache-Control: max-age=0";
        $headers[] = "Authority: www.linkedin.com";
        $headers[] = "Cookie: bcookie=\"v=2&89051535-2e23-458b-88b6-8c4e93e4e803\"; bscookie=\"v=1&201803290241299396f588-fca1-43b5-80b5-82e2d5bfc3d4AQGT4p08PwMSMtQh7CNhLKct0wPu8CFQ\"; _ga=GA1.2.1580299069.1522291290; visit=\"v=1&G\"; _gat=1; leo_auth_token=\"GST:ZC83WpK6Z-BkMLrXBm8jpszKNtW_rkiXrL3zpW0QmDvoMROSmRtCR_:1531076541:684bda292faa154c042cef817fd397e933ed78a1\"; sl=\"v=1&oUYOq\"; li_at=AQEDASI8vzgEMBQ0AAABZHtF_RwAAAFkn1KBHE4AovC-xmhlZpBiAzD-275USnvimivRnZ5y3FZNeJs6LVLP1n83huxilVEtVtm7td76qJ8EbKAo0DKWM4U7xOBCf7AL3fzs2zphVbYaz_D8krdNsihT; liap=true; JSESSIONID=\"ajax:4402266317887323820\"; lang=v=2&lang=es-es; RT=s=1531076541154&r=https%3A%2F%2Fwww.linkedin.com%2Fuas%2Flogin-submit; _guid=a4b08a9f-3874-4125-b3ec-d9f1a8429f69; li_oatml=AQHDn4hPqPQ5owAAAWR7Rh7HTu-lz7ELyWyZ8xAHPWjqfRWlCk9lOWyJiJvEKD8qbayTRGc20OZ0_nvyWVeIywxytcprl-C_; lidc=\"b=TB56:g=1421:u=34:i=1531076566:t=1531153394:s=AQE1e6FZKKZIXcduATVCc2B2yHzMvkqs\"; _lipt=CwEAAAFke0Z90vSsH3fgcJyBFFAxR2vx8d5wJ1eGJ8KUEVjlRwH8BojQ3xa0CUB2QPZ4NYUa02-C143jOE_vC5g8Mc07VBkzYSFyy_NZyTYueXq4hbrv7o-oDZeBhCP_IkBAzhOQKvbjBfzxwogI54PvpYEfXNLwDXceUiD2pRQuPmOWJ8PD5Cy74mFgz3qM-tjiPy0_9Ld2lByhgjE2zjvW1BZf1Iw00iXGfT54GJ1LlNZV3_nLohTUgDsR1Htk5dPd_29doKdX1sjRpAYnwZfcc7GbDcm2eIC4HsE7WRuP9a4Ff9dmYLg46nO0EuFdaaoBsPzYjolqX7UEHv6V7VeJOj3B0Fov_OIV530Zvr0QsBjVIvxhtFp3";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);
        return $result;
    }
    private function getHtml($url, $flag = null){
        /*if($flag === 1){
            return $this->getFakeResponse();
        }

        if($flag === 2){
            return $this->getFakePositionHtml();
        }*/

        
        ////////////////////////////////////////////////////////////////////
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        //curl_setopt($ch, CURLOPT_URL, "https://www.linkedin.com/jobs/view/693629350/");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = "Accept-Encoding: gzip, deflate, br";
        $headers[] = "Accept-Language: en-US,en;q=0.9";
        $headers[] = "Upgrade-Insecure-Requests: 1";
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Mobile Safari/537.36";
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        $headers[] = "Cache-Control: max-age=0";
        $headers[] = "Authority: www.linkedin.com";
        $headers[] = "Cookie: bcookie=\"v=2&89051535-2e23-458b-88b6-8c4e93e4e803\"; bscookie=\"v=1&201803290241299396f588-fca1-43b5-80b5-82e2d5bfc3d4AQGT4p08PwMSMtQh7CNhLKct0wPu8CFQ\"; _ga=GA1.2.1580299069.1522291290; visit=\"v=1&G\"; _gat=1; leo_auth_token=\"GST:ZC83WpK6Z-BkMLrXBm8jpszKNtW_rkiXrL3zpW0QmDvoMROSmRtCR_:1531076541:684bda292faa154c042cef817fd397e933ed78a1\"; sl=\"v=1&oUYOq\"; li_at=AQEDASI8vzgEMBQ0AAABZHtF_RwAAAFkn1KBHE4AovC-xmhlZpBiAzD-275USnvimivRnZ5y3FZNeJs6LVLP1n83huxilVEtVtm7td76qJ8EbKAo0DKWM4U7xOBCf7AL3fzs2zphVbYaz_D8krdNsihT; liap=true; JSESSIONID=\"ajax:4402266317887323820\"; lang=v=2&lang=es-es; RT=s=1531076541154&r=https%3A%2F%2Fwww.linkedin.com%2Fuas%2Flogin-submit; _guid=a4b08a9f-3874-4125-b3ec-d9f1a8429f69; li_oatml=AQHDn4hPqPQ5owAAAWR7Rh7HTu-lz7ELyWyZ8xAHPWjqfRWlCk9lOWyJiJvEKD8qbayTRGc20OZ0_nvyWVeIywxytcprl-C_; lidc=\"b=TB56:g=1421:u=34:i=1531076566:t=1531153394:s=AQE1e6FZKKZIXcduATVCc2B2yHzMvkqs\"; _lipt=CwEAAAFke0Z90vSsH3fgcJyBFFAxR2vx8d5wJ1eGJ8KUEVjlRwH8BojQ3xa0CUB2QPZ4NYUa02-C143jOE_vC5g8Mc07VBkzYSFyy_NZyTYueXq4hbrv7o-oDZeBhCP_IkBAzhOQKvbjBfzxwogI54PvpYEfXNLwDXceUiD2pRQuPmOWJ8PD5Cy74mFgz3qM-tjiPy0_9Ld2lByhgjE2zjvW1BZf1Iw00iXGfT54GJ1LlNZV3_nLohTUgDsR1Htk5dPd_29doKdX1sjRpAYnwZfcc7GbDcm2eIC4HsE7WRuP9a4Ff9dmYLg46nO0EuFdaaoBsPzYjolqX7UEHv6V7VeJOj3B0Fov_OIV530Zvr0QsBjVIvxhtFp3";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        return $result;
    }


}
