<template>
  <div>
    <div
      class="modal fade"
      id="customer-create-modal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" i>Nuevo Cliente</h5>
            <button
              id="dismiss-create"
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form @submit.prevent="saveCustomer">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="name" class="col-form-label">Nombre(s):</label>
                  <input
                    type="text"
                    v-model="name"
                    required
                    maxlength="45"
                    class="form-control"
                    id="name"
                    placeholder="Ingresa el nombre(s) del cliente (máximo 100 caracteres)."
                  />

                  <span v-if="errors.name" class="alert-danger" role="alert">
                    <strong>{{errors.name[0]}}</strong>
                  </span>
                </div>

                <div class="col-md-6">
                  <label for="last_name" class="col-form-label">Apellido(s):</label>
                  <input
                    type="text"
                    v-model="last_name"
                    required
                    maxlength="45"
                    class="form-control"
                    id="last_name"
                    placeholder="Ingresa el apellido(s) del cliente (máximo 100 caracteres)."
                  />
                  <span v-if="errors.last_name" class="alert-danger" role="alert">
                    <strong>{{errors.last_name[0]}}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="birthday" class="col-form-label">Fecha de nacimiento:</label>
                  <input
                    type="date"
                    v-model="birthday"
                    required
                    class="form-control"
                    id="birthday"
                    placeholder="Ingresa la fecha de nacimiento del cliente."
                  />
                  <span v-if="errors.birthday" class="alert-danger" role="alert">
                    <strong>{{errors.birthday[0]}}</strong>
                  </span>
                </div>

                <div class="col-md-6">
                  <label for="dni" class="col-form-label">No. de Identidad:</label>
                  <input
                    type="text"
                    v-model="dni"
                    required
                    maxlength="13"
                    minlength="13"
                    class="form-control"
                    id="dni"
                    placeholder="Ingresa el número de identidad del cliente."
                  />

                  <span v-if="errors.dni" class="alert-danger" role="alert">
                    <strong>{{errors.dni[0]}}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="email" class="col-form-label">e-mail:</label>
                  <input
                    type="email"
                    v-model="email"
                    maxlength="100"
                    class="form-control"
                    id="email"
                    placeholder="Ingresa el e-mail del cliente."
                  />
                  <span v-if="errors.email" class="alert-danger" role="alert">
                    <strong>{{errors.email[0]}}</strong>
                  </span>
                </div>

                <div class="col-md-6">
                  <label for="cellphone_number" class="col-form-label">Número Celular:</label>
                  <input
                    type="tel"
                    v-model="cellphone_number"
                    required
                    maxlength="8"
                    minlength="8"
                    class="form-control"
                    id="cellphone_number"
                    placeholder="Ingresa el número celular del cliente."
                  />
                  <span v-if="errors.cellphone_number" class="alert-danger" role="alert">
                    <strong>{{errors.cellphone_number[0]}}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="address" class="col-form-label">Dirección:</label>
                  <input
                    type="text"
                    v-model="address"
                    required
                    maxlength="100"
                    class="form-control"
                    id="address"
                    placeholder="Ingresa la dirección del cliente (máximo 100 caracteres)."
                  />
                  <span v-if="errors.address" class="alert-danger" role="alert">
                    <strong>{{errors.address[0]}}</strong>
                  </span>
                </div>
              </div>

              <div class="form-group text-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <button
      hidden
      id="show-message"
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#message-modal"
    ></button>
    <div
      :class="success ? 'success' : 'warning'"
      class="modal fade"
      id="message-modal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div :class="success ? 'bg-success' : 'bg-warning'" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modaltitle">{{modal_title}}</h5>
          </div>

          <div class="modal-body">
            {{modal_body}}
            <div class="form-group text-right">
              <button type="button"  v-on:click="hideModal" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

export default {

  data: function() {
    return {
      name: null,
      last_name: null,
      birthday: null,
      dni: null,
      email: null,
      cellphone_number: null,
      address: null,
      errors: [],
      modal_title: "listo",
      success: false,
      modal_body: "listo"
    };
  },
  methods: {
      hideModal: function(){
          window.location.href="customer";
      },
    saveCustomer: function() {
      this.errors = [];

      axios
        .post("customer", {
          name: this.name,
          last_name: this.last_name,
          birthday: this.birthday,
          dni: this.dni,
          email: this.email,
          cellphone_number: this.cellphone_number,
          address: this.address
        })
        .then(res => {
          if (res.data.err == 0) {
            this.modal_title = "Cliente Creado";
            this.modal_body = res.data.message;
            this.success = true;
            $("#dismiss-create").click();
            $("#show-message").click();
          }
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    }
  }
};
</script>
