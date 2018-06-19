<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="float: left;">Resultados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div style="max-height: 300px; overflow-y: scroll;">
          <ul>
            <li>Postularme como <a class="result-job-offer" href="{{ route('ITResources.Iam', ['position'=>'it-profesional'])}}">_Texto a reemplazar__</a></li>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href = '{{ route('ITResources.Iam', ['position'=>'it-profesional'])}}'">Save changes</button>
      </div>
    </div>
  </div>
</div>