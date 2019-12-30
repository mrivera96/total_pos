<template>
  <div id="response-modal"  class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
      <div :class="['modal-content','bg']" >
        <div class="modal-header">
          <h5 class="modal-title">{{this.mTitle}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>{{this.mMessage}}</p>
        </div>
        <div class="modal-footer">
          <a type="button" href="/service" class="btn" :class="this.success ? 'btn-success' : 'btn-danger'" >Aceptar</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['mTitle','mMessage','bg']
}
</script>