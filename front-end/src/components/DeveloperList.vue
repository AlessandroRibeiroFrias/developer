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
            <!-- <router-link :to="'/developers/' + developer.id" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></router-link> -->
						<router-link :to="'/add'" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Adicionar Developer</span></router-link>
						<!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						 -->
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
                        <th>Hobby</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody v-for="(developer, index) in developers.data" :key="index">
                    <tr>
                        <td>{{ developer.id }}</td>
                        <td>{{ developer.nome }}</td>
                        <td>{{ developer.sexo }}</td>
                        <td>{{ developer.idade }}</td>
                        <td>{{ developer.hobby }}</td>
                        <td>
                            <!-- <a href="'/tutorials/' + developer.id" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
                            <router-link :to="'/developers/' + developer.id" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></router-link>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar">&#xE872;</i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</template>

<script>

// import DeveloperDataService from "../services/DeveloperDataService";
import TutorialDataService from "../services/TutorialDataService";

export default {
  name: "tutorials-list",
  data() {
    return {
      developers: [],
      currentDeveloper: null,
      currentIndex: -1,
      title: ""
    };
  },
  methods: {
    retrieveTutorials() {
      TutorialDataService.getAll()
        .then(response => {
          this.developers = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },

    refreshList() {
      this.retrieveTutorials();
      this.currentDeveloper = null;
      this.currentIndex = -1;
    },

    setActiveTutorial(tutorial, index) {
      this.currentDeveloper = tutorial;
      this.currentIndex = index;
    },

    removeAllTutorials() {
      TutorialDataService.deleteAll()
        .then(response => {
          console.log(response.data);
          this.refreshList();
        })
        .catch(e => {
          console.log(e);
        });
    },
    
    searchTitle() {
      TutorialDataService.findByTitle(this.title)
        .then(response => {
          this.developers = response.data;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  mounted() {
      
    this.retrieveTutorials();
  }
};
</script>

