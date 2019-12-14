<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Load required Bootstrap and BootstrapVue CSS -->
        <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

        {{-- Icons --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        <!-- Styles -->
        <style>
        #headImage {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Nav Items */
        .nav-link.active {
            font-size: 1.5em;
        }
        .nav-item {
            font-size: 1.1em;
        }
        /* Input */
        .form-control {
            text-align: center;
            font-size: 1.5em;
            margin-top: 20px;
        }
        .d-block {
            font-size: 1em;
            text-align: center;
        }

        /* Botones */
        .col {
            margin-top: 20px;
        }
        .btn {
            width: 100%;
            font-size: 30px;
        }

        /* Paneles de botones */
        .panelBotones{
            margin-left: 120px;
            margin-right: 120px;
        }
        #panelblanco {
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 15px;
            margin-top: 25px;
            margin-bottom: 25px;
            width: 95%;
            padding-bottom: 25px;
            /*margin-right: 20pc;*/
        }
        #panelrojo {
            display: flex;
            align-items: center;
            width: 48%;
            border-radius: 15px;
        }

        /* invalid feedback */
        .invalid-feedback {
            font-size: 1.1em;
            display: flex;
            text-align: center;
        }

        #input_tramite_usuario{
            display: none;
        }
        #input_prioridad{
            display: none;
        }
        .w-100 .btn-outline-danger {
            width: 32%;
            margin-bottom: 20px;
            margin-right: 20px;
        }
        </style>
    </head>


    <body>
      <div class="container" id="headImage">
        <div class="card" style="width: 60%;">
          @forelse ($Logo as $logo) <img src="{{ $logo->url }}"/ class="img-fluid"
          alt="Responsive image" style="width: 100% \9;" sty>
          @empty
            <p>No hay datos en la base</p>
          @endforelse
        </div>
      </div>

      <div id="app">
        <!-- Tabs with card integration -->
        <b-card no-body>
          <b-tabs v-model="tabIndex" small card align="center">
            <form method="post">
              <b-tab title="Cedula de ciudadania">
                {{-- Hello! --}}
                <b-card>
                  <div
                    class="container"
                    id="panelrojo"
                    style="background: #EE1D23;"
                  >
                    <div
                      class="container"
                      id="panelblanco"
                      style="background: white;"
                    >
                      <div class="form-group">
                        {{ csrf_field() }}
                        <input
                          id="input_Ingreso_Usuario"
                          type="text"
                          class="form-control @if($errors->has('cedula')) is-invalid @endif"
                          placeholder="Ingresa tu Cedula"
                          name="cedula"
                        />
                        @if ($errors->has('cedula'))
                          @foreach($errors->get('cedula') as $error)
                            <div class="invalid-feedback">{{ $error }}</div>
                          @endforeach
                        @endif
                      </div>

                      {{-- Inicio panel de botones registro de cedula --}}
                      <div class="row">
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(1);"
                          >
                            1
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(2);"
                          >
                            2
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(3);"
                          >
                            3
                          </button>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(4);"
                          >
                            4
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(5);"
                          >
                            5
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(6);"
                          >
                            6
                          </button>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(7);"
                          >
                            7
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(8);"
                          >
                            8
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(9);"
                          >
                            9
                          </button>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col cols-sm-12 col-lg-8">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="digitar(0);"
                          >
                            0
                          </button>
                        </div>
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="button"
                            class="btn btn-outline-danger"
                            onclick="excluir();"
                          >
                            <i class="material-icons">backspace</i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </b-card>

                <!-- Control buttons-->
                <div class="text-center">
                  <b-button-group class="mt-2">
                    <b-button
                      class="Button-Next"
                      id="btn_tramite"
                      @click="tabIndex++"
                      variant="success"
                    >
                      Generar Turno
                    </b-button>
                  </b-button-group>
                </div>
              </b-tab>

              <b-tab title="Tramite">
                <b-card>
                  <div class="form-group">
                    {{ csrf_field() }}
                    <input
                      id="input_tramite_usuario"
                      type="text"
                      class="form-control @if($errors->has('opcion_caja_tramite')) is-invalid @endif"
                      name="opcion_caja_tramite"

                    />
                    @if ($errors->has('opcion_caja_tramite'))
                      @foreach ($errors->get('opcion_caja_tramite') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                      @endforeach
                    @endif


                    <input
                      id="input_prioridad"
                      type="text"
                      class="form-control @if($errors->has('opcion_prioridad')) is-invalid @endif"
                      name="opcion_prioridad"
                      value="0"

                    />
                    @if ($errors->has('opcion_prioridad'))
                      @foreach ($errors->get('opcion_prioridad') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                      @endforeach
                    @endif

                  </div>


                  <div class="custom-control custom-switch" style="text-align: center">
                    <input type="checkbox" class="custom-control-input" id="checkPrioridad" onclick="check()">
                    <label class="custom-control-label" for="checkPrioridad">Prioridad</label>
                  </div>

                  <div class="panelBotones">
                    <div class="row">
                      @forelse ($tipoTramite as $tipoTramites)
                        <div class="col col-sm-12 col-lg-4">
                          <button
                            type="submit"
                            class="btn btn-outline-danger"
                            onclick="tramitar( {{ $tipoTramites->id_tipo_tramite }});"
                          >
                            {{ $tipoTramites -> Descripcion }}
                          </button>
                        </div>
                      @empty
                      <p>
                        No se han cargado Tipos de Tramites en la Base de datos!
                      </p>
                      @endforelse
                    </div>
                  </div>
                </b-card>
              </b-tab>
            </form>
          </b-tabs>
        </b-card>
      </div>

      <script src="{{ mix('js/app.js') }}"></script>

      <script type="text/javascript">
        function excluir() {
          var devolver = document.getElementById("input_Ingreso_Usuario").value;
          devolver = devolver.slice(0, -1);
          document.getElementById("input_Ingreso_Usuario").value = devolver;
        }

        function digitar(valor) {
          document.getElementById("input_Ingreso_Usuario").value += valor;
        }

        function tramitar(valor) {
          document.getElementById("input_tramite_usuario").value = valor;
        }

        function check(){
          var campoPrioridad = document.getElementById("input_prioridad").value;

          if (campoPrioridad == 0){
            document.getElementById("input_prioridad").value = 1;
          }
          else {
            document.getElementById("input_prioridad").value = 0;
          }
        }

      </script>


      <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"

        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"
      ></script>
    </body>

</html>
