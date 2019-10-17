<template lang="html">
  <v-layout>
    <v-flex xs12 sm4 offset-sm4>
      <v-card>
        <v-card-text>
          <v-form ref="form" v-model="valid" lazy-validation>
            <div class="LoginDivider">
              <span class="LoginDivider-text">
                <span>Cambio de contraseña</span>
              </span>
              <br />
              <br />

              <v-text-field
                name="contra"
                v-model="contra"
                :counter="20"
                :rules="idRules"
                label="Cantraseña Actual"
                required
                outline
                clearable
              ></v-text-field>

              <v-text-field
                name="nueva1"
                v-model="nueva1"
                :counter="20"
                :rules="idRules"
                label="Nueva contraseña"
                required
                outline
                clearable
              ></v-text-field>

              <v-text-field
                name="nueva2"
                v-model="nueva2"
                :counter="20"
                :rules="idRules"
                label="Repetir la nueva contraseña"
                required
                outline
                clearable
              ></v-text-field>

              <v-btn
                color="success"
                @click="updatecontra"
                class="btn-Green btn--md"
              >
                Cambiar contraseña
              </v-btn>
            </div>
            <!-- <v-btn color="error" @click="reset">
              Reset Form
            </v-btn> -->
          </v-form>
        </v-card-text>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
  data() {
    return {
      cookie1: null,
      lista: "",
      busca: "",
      igual: "",
      valor: "",
      micookie: "",
      nombrecookie1: "idUser",

      usuario: [],
      password: "",
      contra: "",
      nueva1: "",
      nueva2: "",
      idRules: [
        id => !!id || "Numero de Comuna es requerido",
        id => (id && id.length <= 20) || "no puede superar los 10 caracteres"
      ]
    };
  },
  created() {
    this.cookie1 = document.cookie;
    this.traerusu();
  },
  methods: {
    traerusu() {
      this.lista = this.cookie1.split(";");
      for (var i = 0; i < this.lista.length; i++) {
        this.busca = this.lista[i].search(this.nombrecookie1);
        if (this.busca > -1) {
          this.micookie = this.lista[i];
        }
      }
      this.igual = this.cookie1.indexOf("=");
      this.valor = this.cookie1.substring(this.igual + 1);

      let config = {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        }
      };
      let params = new FormData();
      params.append("idusuario", this.valor);
      axios
        .post(
          "https://projectcallcente.000webhostapp.com/api/api.php?action=buscaruser",
          params,
          config
        )
        .then(res => {
          this.usuario = res.data.usuario;

          console.log(this.usuario);
        });
    },
    updatecontra() {
      let config = {
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        }
      };
      let params = new FormData();
      params.append("idusuario", this.valor);
      params.append("nueva", this.nueva1);

      if (this.contra == this.usuario[0].password) {
        if (this.nueva1 == this.nueva2) {
          axios
            .post(
              "https://projectcallcente.000webhostapp.com/api/api.php?action=updatecontra",
              params,
              config
            )
            .then(res => {
              Swal.fire({
                position: 'top',
                type: 'success',
                title: 'Contraseña Cambiada exitosamente',
                showConfirmButton: false,
                timer: 1500
              })
            });
        } else {
          Swal.fire({
            type: "error",
            title: "Error...",
            text: "Las contraseñas no coinciden"
          });
        }
      } else {
        Swal.fire({
          type: "error",
          title: "Error...",
          text: "Contraseña Incorrecta"
        });
      }
    }
  }
};
</script>

<style lang="css" scoped>
.v-card__text {
    margin-top: 50px;
}
.LoginDivider-text::before {
  content: "";
  position: absolute;
  top: 53%;
  right: 100%;
  width: 1000px;
  border-bottom: 1.5px solid #757575;
}
.LoginDivider-text:after {
  content: "";
  position: absolute;
  top: 53%;
  left: 100%;
  width: 5000px;
  border-bottom: 1.5px solid #757575;
}
.LoginDivider-text {
  position: relative;
  /* font-family: "cooper_hewittmedium"; */
  padding: 12px;
  font-weight: 600;
  color: #1c3643;
  font-size: 20px;
}
.LoginDivider {
  text-align: center;
  overflow: hidden;
  margin: 1rem auto;
  width: 94%;
}
.btn-Green,
.btn-green {
  background: -webkit-linear-gradient(
    right,
    #95ca3e 0%,
    #95ca3e 50%,
    #85c638 100%
  );
}
.btn,
.btn-Green,
.btn-green {
  background-color: #d3d3d3;
  border: none;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: "Lato", sans-serif;
  font-size: 13px;
  padding: 8px 0.8em 6px 0.8em;
  text-decoration: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-user-select: none;
  user-select: none;
  -webkit-transition: 0.2s;
  -moz-transition: 0.2s;
  -o-transition: 0.2s;
  -ms-transition: 0.2s;
  transition: 0.2s;
  vertical-align: middle;
  white-space: nowrap;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: 0;
}
.btn-Green {
  height: 45px;
  width: 100%;
}
.success {
    margin-left: 0px;
}
.inputs {
    margin-top: 40px;
}

.btn-Red,
.btn-green {
  background: -webkit-linear-gradient(
    right,
    #F44336 0%,
    #F44336 50%,
    #F44336 100%
  );
}
.btn,
.btn-Red,
.btn-green {
  background-color: #d3d3d3;
  border: none;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: "Lato", sans-serif;
  font-size: 13px;
  padding: 8px 0.8em 6px 0.8em;
  text-decoration: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -webkit-tap-highlight-color: transparent;
  -webkit-user-select: none;
  user-select: none;
  -webkit-transition: 0.2s;
  -moz-transition: 0.2s;
  -o-transition: 0.2s;
  -ms-transition: 0.2s;
  transition: 0.2s;
  vertical-align: middle;
  white-space: nowrap;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: 0;
}
.btn-Red {
  height: 45px;
  width: 100%;
}
.error {
    margin-left: 0px;
}
</style>
