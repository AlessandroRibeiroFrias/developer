<template>
<div id="editEmployeeModal" class="">
    <form>
        <h3>Editar Developer</h3>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" v-model="currentDeveloper.nome" required>
            </div>
            <div class="form-group">
                <label>Sexo</label>
                <input type="text" class="form-control" v-model="currentDeveloper.sexo" required>
            </div>
            <div class="form-group">
                <label>Idade</label>
                <input type="text" class="form-control" v-model="currentDeveloper.idade" value="" required>
            </div>
            <div class="form-group">
                <label>Data de Nascimento</label>
                <input type="date" class="form-control" v-model="currentDeveloper.datanascimento" required>
            </div>
            <div class="form-group">
                <label>Hobby</label>
                <input type="text" class="form-control" v-model="currentDeveloper.hobby" required>
            </div>		
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-info" value="Save">
        </div>
    </form>
</div>
</template>

<script>
import TutorialDataService from "../services/TutorialDataService";

export default {
  name: "tutorial",
  data() {
    return {
      currentDeveloper: null,
      message: ''
    };
  },
  methods: {
    getDeveloper(id) {
      TutorialDataService.get(id)
        .then(response => {
          this.currentDeveloper = response.data.data;
          console.log(this.currentDeveloper);
        })
        .catch(e => {
          console.log(e);
        });
    },

    updatePublished(status) {
      var data = {
        id: this.currentDeveloper.id,
        title: this.currentDeveloper.title,
        description: this.currentDeveloper.description,
        published: status
      };

      TutorialDataService.update(this.currentDeveloper.id, data)
        .then(response => {
          this.currentDeveloper.published = status;
          console.log(response.data);
        })
        .catch(e => {
          console.log(e);
        });
    },

    updateTutorial() {
      TutorialDataService.update(this.currentDeveloper.id, this.currentDeveloper)
        .then(response => {
          console.log(response.data);
          this.message = 'The tutorial was updated successfully!';
        })
        .catch(e => {
          console.log(e);
        });
    },

    deleteTutorial() {
      TutorialDataService.delete(this.currentDeveloper.id)
        .then(response => {
          console.log(response.data);
          this.$router.push({ name: "tutorials" });
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
  mounted() {
    this.message = '';
    this.getDeveloper(this.$route.params.id);
  }
};
</script>

