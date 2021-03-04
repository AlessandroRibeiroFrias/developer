<template>
<div class="">
    <form v-if="currentDeveloper"> 
        <h3>Editar Developer</h3>
        <div class="form-group" :class="{ 'form-group--error': $v.nome.$error }" >
            <label>Nome</label>
            <input type="text" class="form-control" v-model.trim="nome" @input="setNome($event.target.value)">
        </div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.nome.required">Nome é obrigatório</div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.nome.minLength">O nome deve ter pelo menos {{$v.nome.$params.minLength.min}} letras.</div>
        
        <div class="form-group" :class="{ 'form-group--error': $v.sexo.$error }">
            <label>Sexo</label>
            <input type="text" class="form-control" v-model.trim="sexo"  @input="setSexo($event.target.value)">
        </div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.sexo.required">Sexo é obrigatório</div>

        <div class="form-group">
            <label>Idade</label>
            <input type="text" class="form-control" v-model="currentDeveloper.idade" required>
        </div>

        <div class="form-group" :class="{ 'form-group--error': $v.datanascimento.$error }">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control" v-model.trim="datanascimento"  @input="setDataNascimento($event.target.value)">
        </div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.datanascimento.required">Data de Nascimento é obrigatório</div>

        <div class="form-group" :class="{ 'form-group--error': $v.hobby.$error }">
            <label>Hobby</label>
            <input type="text" class="form-control" v-model.trim="hobby"  @input="setHobby($event.target.value)">
        </div>		
        <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.required">Hobby é obrigatório</div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.minLength">O hobby deve ter pelo menos {{$v.hobby.$params.minLength.min}} letras.</div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="button" class="btn btn-info" value="Salvar" @click="updateDeveloper" :disabled="disabled">
        </div>
    </form>
    <p>{{ message }}</p>
</div>

</template>

<script>
import TutorialDataService from "../services/TutorialDataService";
// import { required, minLength } from '../ vuelidate/lib/validators';

import { required, minLength } from '../../node_modules/vuelidate/lib/validators';

export default {
  name: "developer",
  data() {
    return {
      currentDeveloper: null,
      nome:'',
      sexo: '',
      idade: '',
      datanascimento: '',
      hobby: '',
      message: '',
      disabled: false
    };
  },
  validations: {
    nome: {
      required,
      minLength: minLength(4)
    },
    sexo:{
      required
    },
    datanascimento:{
      required
    },
    hobby:{
      required,
      minLength: minLength(4)
    }
  },
  methods: {
    setNome(value) {
      this.nome = value
      this.$v.nome.$touch()
      this.disabled = (!this.$v.nome.required || !this.$v.nome.minLength);
    },

    setSexo(value) {
      this.sexo = value
      this.$v.sexo.$touch()
      this.disabled = (!this.$v.sexo.required);
    },
    setDataNascimento(value) {
      this.datanascimento = value
      this.$v.datanascimento.$touch()
      this.disabled = (!this.$v.datanascimento.required);
    },
    setHobby(value) {
      this.hobby = value
      this.$v.hobby.$touch()
      this.disabled = (!this.$v.hobby.required || !this.$v.hobby.minLength);
    },

    getDeveloper(id) {
      TutorialDataService.get(id)
        .then(response => {
          this.nome = response.data.data.nome;
          this.sexo = response.data.data.sexo;
          this.idade = response.data.data.idade;
          this.datanascimento = response.data.data.datanascimento;
          this.hobby = response.data.data.hobby;

          this.currentDeveloper = response.data.data;

        })
        .catch(e => {
          console.log(e);
        });
    },
    updateDeveloper() {
      TutorialDataService.update(this.currentDeveloper.id, this.currentDeveloper)
        .then(response => {
          this.message = response.data.data[0];
          setTimeout(() => this.$router.push({ name: "developers" }), 1500);
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

