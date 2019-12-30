<template>
  <div class="card">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Nombre(s)</th>
            <th scope="col">Apellido(s)</th>
            <th scope="col">Nombre de usuario</th>
            <th scope="col">Rol</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="user of this.users"
            v-bind:key="user.id"
          >
            <th scope="row">{{user.id}}</th>
            <th scope="row">
              <img
                class="rounded-circle"
                style="width: 30px;height: 30px"
                :src="user.avatar"
              >
            </th>
            <td>{{user.name}}</td>
            <td>{{user.last_name}}</td>
            <td>{{user.username}}</td>
            <td>{{user.role.description}}</td>
          </tr>
        </tbody>
      </table>

      <div class="mt-5">
        <button
          class="btn btn-success"
          data-toggle="modal"
          data-target="#newUser"
        >Nuevo usuario</button>
      </div>
    </div>

    <user-create-component></user-create-component>

  </div>
</template>
<script>
export default {
  mounted() {
    this.getUsers();
  },
  data: function() {
    return {
      users: []
    };
  },
  methods: {
    getUsers() {
      axios.get("/user").then(response => {
        this.users = response.data.users;

        this.users.forEach(element => {
          if (element.avatar !== null) {
            element.avatar = "/img/" + element.avatar;
          }
        });
      });
    }
  }
};
</script>
