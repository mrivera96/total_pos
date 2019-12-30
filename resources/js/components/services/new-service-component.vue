<template>
  <form
    id="new_serv"
    method="POST"
    @submit.prevent="storeService"
    :action="this.action"
  >
    <div
      class="form-group row align-content-center"
      style="position: relative"
    >
      <label
        class="btn btn-default fas fa-camera rounded-circle bg-gradient-blue"
        style="position: absolute; left: 43%; top: 85%"
      >
        <input
          id="file"
          ref="file"
          type="file"
          name="image"
          v-on:change="FileUpload"
          style="display: none;"
        />
      </label>

      <img
        id="preview"
        class="rounded-circle m-auto"
        style="width: 130px;height: 130px"
        :src="this.src"
      />
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label
          for="name"
          class="col-md-12 col-form-label text-left"
        >Nombre del servicio:</label>
        <input
          id="name"
          type="text"
          class="form-control"
          :class="{'is-invalid': this.errors.name }"
          name="name"
          placeholder="Ingresa el nombre del servicio."
          autofocus
          required
        />

        <span
          v-if="this.errors.name"
          class="invalid-feedback"
          role="alert"
        >
          <strong>{{ this.errors.name[0] }}</strong>
        </span>
      </div>

      <div class="col-md-6">
        <label
          for="description"
          class="col-md-12 col-form-label text-left"
        >Descripción:</label>
        <input
          id="description"
          type="text"
          class="form-control"
          :class="{ 'is-invalid': this.errors.description }"
          placeholder="Ingresa la descripción del servicio."
          required
          name="description"
        />
        <span
          v-if="this.errors.description"
          class="invalid-feedback"
          role="alert"
        >
          <strong>{{ this.errors.description[0] }}</strong>
        </span>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label
          for="sale_price"
          class="col-md-12 col-form-label text-left"
        >Precio de venta:</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Lps.</span>
          </div>
          <input
            id="sale_price"
            type="text"
            class="form-control"
            :class="{ 'is-invalid': this.errors.sale_price }"
            placeholder="Ingresa el precio de venta del servicio."
            name="sale_price"
            required
          />

          <span
            v-if="this.errors.sale_price"
            class="invalid-feedback"
            role="alert"
          >
            <strong>{{ this.errors.sale_price[0] }}</strong>
          </span>
        </div>
      </div>

      <div class="col-md-6 align-middle">
        <div class="form-check">
          <input
            id="detail"
            type="checkbox"
            class="form-check-input"
            v-model="detail"
          />
          <label
            for="detail"
            class="form-check-label"
          >Agregar Productos</label>
        </div>
      </div>
    </div>

    <div
      class="form-group row"
      v-if="detail"
    >
      <div class="col-md-4">
        <select
          class="form-control"
          v-model="tempProd.product_id"
        >
          <option
            v-for="prodct in prods"
            :key="prodct.id"
            :value="prodct.id"
          >{{
            prodct.name
          }}</option>
        </select>
      </div>

      <div class="col-md-4">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Qty</span>
          </div>

          <input
            class="form-control"
            type="number"
            v-model="tempProd.quantity"
          />
        </div>
      </div>
      <div class="col-md-4">
        <button
          type="button"
          class="btn btn-primary"
          v-on:click="addProduct()"
        >
          Agregar
        </button>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6">
        <label for="products"></label>
      </div>
    </div>

    <div
      v-if="this.productos.length && detail"
      class="form-group row text-center"
    >
      <h5>Productos a agregar</h5>
      <table class="table table-hover table-striped border-0">
        <thead>
          <tr>
            <th scope="col">Id Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col"></th>
          </tr>
        </thead>

        <tbody>
          <tr
            v-for="prod in this.productos"
            :key="prod.product_id"
          >
            <td>{{ prod.product_id }}</td>
            <td>{{ prod.quantity }}</td>
            <td>
              <button
                type="button"
                class="btn btn-danger"
                v-on:click="deleteMate(prod.id)"
              >
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="form-group row mb-0">
      <div class="col-md-12 text-right">
        <button
          type="submit"
          class="my-float btn bg-primary"
        >
          <i class="fas fa-lg fa-save"></i>
        </button>
      </div>
    </div>

    <service-modal-component
      v-bind:mMessage="this.mResponse.mMessage"
      v-bind:mTitle="this.mResponse.mTitle"
      v-bind:bg="this.mResponse.mBg"
    ></service-modal-component>
  </form>
</template>

<script>
export default {
  props: ["action", "src"],
  data: function() {
    return {
      detail: false,
      prods: [],
      tempProd: {
        product_id: null,
        quantity: null
      },
      mResponse: {
        mTitle: null,
        mMessage: null,
        mBg: null
      },
      productos: [],

      errors: []
    };
  },
  mounted() {
    axios
      .get("/product")
      .then(response => (this.prods = response.data.products));
  },
  methods: {
    FileUpload: function() {
      var imgPath = this.$refs.file.value;
      var ext = imgPath.substring(imgPath.lastIndexOf(".") + 1).toLowerCase();
      if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
        this.readURL(this.$refs.file);
      else
        alert("Por favor, seleccione un archivo de imagen (jpg, jpeg, png).");
    },
    readURL: function(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload = function(e) {
          $("#preview").attr("src", e.target.result);
        };
      }
    },
    addProduct: function() {
      var counter = 0;
      this.productos.forEach(element => {
        if (element.id == this.tempProd.product_id) {
          counter++;
        }
      });

      if (counter == 0) {
        this.productos.push(this.tempProd);
      } else {
        alert("Este producto ya está agregado.");
      }
    },
    deleteMate: function(product) {
      this.productos.splice(this.productos.indexOf(product), 1);
    },
    storeService: function() {
      var form = document.getElementById("new_serv");
      var formData = new FormData(form);
      formData.append("productos[]", JSON.stringify(this.productos));

      axios
        .post("/service", formData, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          this.mResponse.mTitle = "Nuevo Servicio";
          this.mResponse.mMessage = response.data.message;
          this.mResponse.mBg = 'bg-success';

          $("#response-modal").show();
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          } else {
            this.mResponse.mTitle = "Nuevo Servicio";
            this.mResponse.mMessage = error.response.message;
            this.mResponse.mBg = 'bg-danger';

            $("#response-modal").show();
          }
        });
    }
  }
};
</script>
