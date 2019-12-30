<template>
  <div id="modal"  class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
      <div :class="['modal-content','mBg']" >
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

            <router-link  type="button" :class="'btnClass'" :to="this.href">Aceptar</router-link>
 
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    props:['mTitle','mMessage','mBg','href','btnClass']
}
</script>