<template>
  <div class="container-xl">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2><b>Developers</b></h2>
            </div>
            <div class="col-sm-6">
              <router-link :to="'/add'" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar Developer</span></router-link>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover" >
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Sexo</th>
              <th>Idade</th>
              <th>Data de Nascimento</th>
              <th>Hobby</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody v-for="(developer, index) in developers.data" :key="index">
            <tr>
              <td>{{ developer.id }}</td>
              <td>{{ developer.nome }}</td>
              <td>{{ caseGenero(developer.sexo) }}</td>
              <td>{{ developer.idade }}</td>
              <td>{{ formatDate(developer.datanascimento) }}</td>
              <td>{{ developer.hobby }}</td>
              <td>
                <router-link :to="'/developers/' + developer.id" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></router-link>
                <a href="#" @click="deleteDeveloper(developer.id)" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar">&#xE872;</i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <p>{{ message }}</p>
    <FlashMessage></FlashMessage>
  </div>
</template>

<script>

// import DeveloperDataService from "../services/DeveloperDataService";
import DeveloperDataService from "../services/DeveloperDataService";
import moment from 'moment';

export default {
  name: "developers-list",
  data() {
    return {
      developers: [],
      currentDeveloper: null,
      currentIndex: -1,
      title: "",
      message: ""
    };
  },
  methods: {
    retrieveDeveloper() {
      DeveloperDataService.getAll()
        .then(response => {
          this.developers = response.data;
          this.message = '';
        })
        .catch(e => {
          console.log(e);
        });
    },
    caseGenero(genero){
      var generoLocal = '';
      switch (genero) {
        case  'M':
          generoLocal = 'Masculino'
          break;

        case  'F':
          generoLocal = 'Feminino'
          break;
      
        default:
          generoLocal = 'error'
          break;
      }

      return generoLocal;
    },
    formatDate(dateAlter){
      return moment(String(dateAlter)).format('DD/MM/YYYY');
    },

    deleteDeveloper(idDeveloper) {
      DeveloperDataService.delete(idDeveloper)
        .then(response => {

          this.flashMessage.success({
              title: 'Sucesso',
              message: response.data.data[0],
              time: 2000,
              flashMessageStyle: {
                  backgroundColor: 'linear-gradient(#e66465, #9198e5)'
              }
          });

          setTimeout(() => this.retrieveDeveloper(), 2500);
    
        })
        .catch(e => {
          console.log(e);
        });
    }

  },
  mounted() {
      
    this.retrieveDeveloper();
  }
};
</script>
