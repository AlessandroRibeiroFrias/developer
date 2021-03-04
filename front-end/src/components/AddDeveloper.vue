<template>
<div v-if="!submitted">
    <h3>Cadastrar Developer</h3>
    <div class="form-group" :class="{ 'form-group--error': $v.nome.$error }" >
        <label>Nome</label>
        <input type="text" class="form-control" id="nome" @focusout="requiredName" v-model="nome" @input="setNome($event.target.value)">
    </div>
    <div class="error alert alert-danger" role="alert" v-if="!$v.nome.required && !nomeRequired">Nome é obrigatório</div>
    <div class="error alert alert-danger" role="alert" v-if="!$v.nome.minLength">O nome deve ter pelo menos {{$v.nome.$params.minLength.min}} letras.</div>
    <div class="error alert alert-danger" role="alert" v-if="!$v.nome.maxLength">O nome deve ter no máximo {{$v.nome.$params.maxLength.max}} letras.</div>
    
    <div class="row">
      <div class="col-md-4">
        <div class="form-group" :class="{ 'form-group--error': $v.sexo.$error }">
            <label>Sexo</label>
            <input type="text" class="form-control" @focusout="requiredSexo" v-model.trim="sexo"  @input="setSexo($event.target.value)">
        </div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.sexo.required && !sexoRequired">Sexo é obrigatório</div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <label>Idade</label>
            <input type="text" class="form-control" v-model.trim="idade" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group" :class="{ 'form-group--error': $v.datanascimento.$error }">
            <label>Data de Nascimento</label>
            <input type="date" class="form-control" @focusout="requiredDataNascimento" v-model.trim="datanascimento"  @input="setDataNascimento($event.target.value)">
        </div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.datanascimento.required && !datanascimentoRequired">Data de Nascimento é obrigatório</div>
      </div>
    </div>


    <div class="form-group" :class="{ 'form-group--error': $v.hobby.$error }">
        <label>Hobby</label>
        <input type="text" class="form-control" @focusout="requiredHobby" v-model.trim="hobby"  @input="setHobby($event.target.value)">
    </div>		
    <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.required && !hobbyRequired">Hobby é obrigatório</div>
    <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.minLength">O hobby deve ter pelo menos {{$v.hobby.$params.minLength.min}} letras.</div>
    <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.maxLength">O nome deve ter no máximo {{$v.hobby.$params.maxLength.max}} letras.</div>

    <div class="modal-footer">
        <input type="button" class="btn btn-default" value="Cancel" @click="returnList">
        <input type="button" class="btn btn-info"    value="Salvar" @click="saveDeveloper" :disabled="disabled">
    </div>
  <p>{{ message }}</p>
</div>

</template>

<script>
import TutorialDataService from "../services/TutorialDataService";
import { required, minLength, maxLength } from '../../node_modules/vuelidate/lib/validators';

export default {
  name: "add-developer",
  data() {
    return {
      currentDeveloper: null,
      nome: "",
      nomeRequired: true,

      sexo: '',
      sexoRequired: true,

      idade: "",
      datanascimento: '',
      datanascimentoRequired: true,
      
      hobby: '',
      hobbyRequired: true,


      message: '',
      disabled: true,
      submitted: false
    };
  },
  validations: {
    nome: {
      required,
      minLength: minLength(4),
      maxLength: maxLength(50)
    },
    sexo:{
      required
    },
    datanascimento:{
      required
    },
    hobby:{
      required,
      minLength: minLength(4),
      maxLength: maxLength(100)
    }
  },
  methods: {
    setNome(value) {
      this.nome = value
      console.log(value);
      this.$v.nome.$touch()
      this.disabled = (!this.$v.nome.required || !this.$v.nome.minLength || !this.$v.nome.maxLength);
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
      this.disabled = (!this.$v.hobby.required || !this.$v.hobby.minLength || !this.$v.nome.maxLength);
    },
    requiredName(){
      this.nomeRequired = (this.$v.nome.required && this.$v.nome.minLength && this.$v.nome.maxLength);
    },
    requiredSexo(){
      this.sexoRequired = this.$v.sexo.required ;
    },
     requiredDataNascimento(){
      this.datanascimentoRequired = this.$v.datanascimento.required;
    },
     requiredHobby(){
      this.hobbyRequired = (this.$v.nome.required && this.$v.nome.minLength && this.$v.nome.maxLength);
    },
    saveDeveloper() {
      var data = {
        nome: this.nome,
        sexo: this.sexo,
        idade: this.idade,
        datanascimento: this.datanascimento,
        hobby: this.hobby
      };

      TutorialDataService.create(data)
        .then(response => {
          // this.tutorial.id = response.data.id;
          console.log(response.data);
          // this.submitted = true;
        })
        .catch(e => {
          console.log(e);
        });
    },
    
    returnList(){
      this.$router.push({ name: "developers" });
    }
  }
};
</script>