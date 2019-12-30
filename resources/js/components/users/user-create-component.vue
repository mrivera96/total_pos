<template>
    <div class="modal fade" tabindex="-1" id="newUser" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h5 class="modal-title">Crear Usuario</h5>
                    <a id="dismiss-create" class="close link" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>

                <div class="modal-body">
                    <form id="newUsr" method="POST" enctype="multipart/form-data" action="/user"
                          @submit.prevent="storeUser">
                        <div class="form-group row align-content-center">
                            <img id="preview" class="rounded-circle m-auto" style="width: 130px;height: 130px"
                                 src="img/profile.png"/>
                        </div>
                        <div class="input-group col-md-6 mx-auto">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Subir una imagen
                                </span>
                                
                            </div>
                            <div class="custom-file">
                                <input id="avatar" class="custom-file-input" :class="{ 'is-invalid': errors.avatar }" ref="file" type="file"
                                       v-on:change="FileUpload" name="avatar"  />
                                <label id="avatarLabel" class="custom-file-label" for="avatar">Elije una imagen.</label> 
                            </div>
                           
                        </div>

                        <span v-if="errors.avatar" class="alert alert-danger" role="alert">
                            <strong>{{ errors.avatar[0] }}</strong>
                        </span>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label text-left">Nombre (s)</label>
                                <input id="name" type="text" class="form-control" :class="{ 'is-invalid': errors.name }"
                                       name="name" maxlength="45" placeholder="Ingresa el nombre o nombres del usuario."
                                        autofocus
                                />

                                <span v-if="errors.name" class="invalid-feedback" role="alert">
                                    <strong>{{ this.errors.name[0] }}</strong>
                                </span>
                            </div>

                            <div class="col-md-6">
                                <label for="last_name" class="col-form-label text-left">Apellido (s)</label>
                                <input id="last_name" type="text" class="form-control"
                                       :class="{ 'is-invalid': errors.last_name }" maxlength="45"
                                       placeholder="Ingresa el o los apellidos del usuario." name="last_name" autofocus/>

                                <span v-if="errors.last_name" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.last_name[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="username" class="col-form-label text-left">Nombre de usuario (Se usará para
                                    iniciar sesión).</label>
                                <input id="username" type="text" class="form-control"
                                       :class="{ 'is-invalid': errors.username }"
                                       placeholder="Ingresa el nombre de usuario sin espacios." maxlength="15"
                                       name="username" autofocus/>

                                <span v-if="errors.username" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.username[0] }}</strong>
                                </span>
                            </div>

                            <div class="col-md-6">
                                <label for="dni" class="col-form-label text-left">No. Identidad</label>
                                <input id="dni" type="text" minlength="13" maxlength="13" class="form-control"
                                       :class="{ 'is-invalid': errors.dni }"
                                       placeholder="Ingresa el número de identidad del usuario sin espacios ni guiones."
                                       name="dni" />

                                <span v-if="errors.dni" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.dni[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="birthday" class="col-form-label text-left">Fecha de nacimiento</label>
                                <input id="birthday" type="date" class="form-control"
                                       :class="{ 'is-invalid': errors.birthday }" name="birthday" />

                                <span v-if="errors.birthday" class="invalid-feedback" role="alert">
                                    <strong>{{errors.birthday[0]}}</strong>
                                </span
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="mobile" class="col-form-label text-left">Número celular</label>
                                <input id="mobile" type="tel" maxlength="8" minlength="8" class="form-control"
                                       :class="{ 'is-invalid': errors.mobile }"
                                       placeholder="Ingresa el número de celular del usuario sin espacios ni guiones."
                                       name="mobile" />

                                <span v-if="errors.mobile" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.mobile[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="address" class="col-form-label text-left">Dirección</label>
                                <input id="address" type="text" maxlength="100" class="form-control"
                                       :class="{ 'is-invalid': errors.address }"
                                       placeholder="Ingresa la dirección del usuario (máximo 100 caracteres)."
                                       name="address" />

                                <span v-if="errors.address" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.address[0] }}</strong>
                                </span>
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-left">Dirección de correo
                                    electrónico'</label>
                                <input id="email" type="email" maxlength="100" class="form-control"
                                       :class="{ 'is-invalid': errors.email }"
                                       placeholder="Ingresa el e-mail del usuario (máximo 100 caracteres)."
                                       name="email"/>

                                <span v-if="errors.email" class="invalid-feedback" role="alert">
                                    <strong>{{ errors.email[0] }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="role_id" class="col-form-label text-left">Rol</label>
                                <select class="form-control" :class="{ 'is-invalid': errors.role_id }" name="role_id" required>
                                    <option v-for="role of this.roles" v-bind:key="role.id" :value="role.id">
                                        {{role.description}}
                                    </option>
                                </select>

                                <span v-if="this.errors.role_id" class="invalid-feedback" role="alert">
                                    <strong>{{ this.errors.role_id[0] }}</strong>
                                </span>

                            </div>

                            <div class="col-md-6">
                                <label for="branch_id" class="col-form-label text-left">Sucursal</label>
                                <select class="form-control" :class="{ 'is-invalid': errors.branch_id }" name="branch_id"  required>
                                    <option v-for="branch of this.branches" v-bind:key="branch.id" :value="branch.id">
                                        {{branch.description}}
                                    </option>
                                </select>

                                <span v-if="this.errors.branch_id" class="invalid-feedback" role="alert">
                                    <strong>{{ this.errors.branch_id[0] }}</strong>
                                </span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-form-label text-left">Contraseña</label>
                                <input id="password" type="password"
                                       class="form-control"
                                       :class="{ 'is-invalid': errors.password }"
                                       placeholder="Ingresa la nueva contraseña del usuario."
                                       autocomplete="current-password"/>
                                <span v-if="this.errors.password" class="invalid-feedback" role="alert">
                                    <strong>{{ this.errors.password[0] }}</strong>
                                </span>

                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="col-form-label text-left">Confirmar
                                    contraseña</label>
                                <input id="password-confirm" type="password"
                                       class="form-control"
                                       :class="{ 'is-invalid': errors.password }"
                                       name="password_confirmation" 
                                       placeholder="Ingrese de nuevo la contraseña."/>

                                <span v-if="this.errors.password" class="invalid-feedback" role="alert">
                                    <strong>{{ this.errors.password[0] }}</strong>
                                </span>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="my-float btn bg-primary">
                                    <i class="fas fa-lg fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.loadRoles();
            this.loadBranches();
        },
        data: function () {
            return {
                errors: [],
                mResponse: {
                    mTitle: null,
                    mMessage: null,
                    mBg: null,
                    href: null,
                    btnClass: null
                },
                roles: [],
                branches: []
            };
        },
        methods: {
            FileUpload: function () {
                var imgPath = this.$refs.file.value;
                var ext = imgPath
                    .substring(imgPath.lastIndexOf(".") + 1)
                    .toLowerCase();
                if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
                    this.readURL(this.$refs.file);
                    $("#avatarLabel").val(imgPath);
                } else {
                    alert(
                        "Por favor, seleccione un archivo de imagen (jpg, jpeg, png)."
                    );
                }
            },
            readURL: function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    reader.onload = function (e) {
                        $("#preview").attr("src", e.target.result);
                    };
                }
            },
            loadRoles() {
                axios.get("/role").then((response) => (this.roles = response.data.roles))
            },
            loadBranches() {
                axios.get("/branch").then((response) => (this.branches = response.data.branches))
            },
            storeUser() {
                var form = document.getElementById("newUsr");
                var formData = new FormData(form);
                axios
                    .post("/user", formData)
                    .then(response => {
                        if (response.data.error == 0) {
                            this.mResponse.mTitle = "¡Usuario Creado!";
                            this.mResponse.mMessage = response.data.message;
                            this.mResponse.mBg = "bg-success";
                            this.mResponse.href = "/user";
                        } else if (response.data.error == 1) {
                            this.mResponse.mTitle = "¡Error al crear usuario!";
                            this.mResponse.mMessage = response.data.message;
                            this.mResponse.mBg = "bg-warning";
                            this.mResponse.href = "/user";
                        }
                        $("#modal").show();
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        } else {
                            this.mResponse.mTitle = "¡Error al crear usuario!";
                            this.mResponse.mMessage = response.data.message;
                            this.mResponse.mBg = "bg-danger";
                            this.mResponse.href = "/user";
                            $("#modal").show();
                        }
                    });
            }
        }
    };
</script>
