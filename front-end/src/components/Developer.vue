<template>
<div class="">
    <form v-if="id"> 
        <h3>Editar Developer</h3>
        <div class="form-group" :class="{ 'form-group--error': $v.nome.$error }" >
            <label>Nome</label>
            <input type="text" class="form-control" v-model.trim="nome" @input="setNome($event.target.value)">
        </div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.nome.required">Nome é obrigatório</div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.nome.minLength">O nome deve ter pelo menos {{$v.nome.$params.minLength.min}} letras.</div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.nome.maxLength">O nome deve ter no máximo {{$v.nome.$params.maxLength.max}} letras.</div>
        
        <div class="row">
          <div class="col-md-4">
            <div class="form-group" :class="{ 'form-group--error': $v.sexo.$error }">
                <label>Sexo</label>
                <select class="form-control " v-model.trim="sexo" @change="setSexo($event.target.value)" aria-label="Selecione">
                  <option  value="M">Masculino</option>
                  <option  value="F">Feminino</option>
                </select>
                <!-- <input type="text" class="form-control" v-model.trim="sexo"  @input="setSexo($event.target.value)"> -->
            </div>
            <div class="error alert alert-danger" role="alert" v-if="!$v.sexo.required">Sexo é obrigatório</div>
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
                <input type="date" class="form-control" v-model.trim="datanascimento"  @input="setDataNascimento($event.target.value)">
            </div>
            <div class="error alert alert-danger" role="alert" v-if="!$v.datanascimento.required">Data de Nascimento é obrigatório</div>
          </div>
        </div>


        <div class="form-group" :class="{ 'form-group--error': $v.hobby.$error }">
            <label>Hobby</label>
            <input type="text" class="form-control" v-model.trim="hobby"  @input="setHobby($event.target.value)">
        </div>		
        <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.required">Hobby é obrigatório</div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.minLength">O hobby deve ter pelo menos {{$v.hobby.$params.minLength.min}} letras.</div>
        <div class="error alert alert-danger" role="alert" v-if="!$v.hobby.maxLength">O nome deve ter no máximo {{$v.hobby.$params.maxLength.max}} letras.</div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default" value="Cancel" @click="returnList">
            <input type="button" class="btn btn-success"    value="Salvar" @click="updateDeveloper" :disabled="$v.$invalid">
        </div>
    </form>
    <p>{{ message }}</p>
    <FlashMessage></FlashMessage>
</div>

</template>

<script>
import DeveloperDataService from "../services/DeveloperDataService";
import { required, minLength, maxLength } from '../../node_modules/vuelidate/lib/validators';

export default {
  name: "developer",
  data() {
    return {
      id:'',
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
      this.$v.nome.$touch();
    },

    setSexo(value) {
      this.sexo = value
      this.$v.sexo.$touch();
    },
    setDataNascimento(value) {
      this.datanascimento = value
      this.$v.datanascimento.$touch();
    },
    setHobby(value) {
      this.hobby = value
      this.$v.hobby.$touch();
    },

    getDeveloper(id) {
      DeveloperDataService.get(id)
        .then(response => {
          this.id = response.data.data.id;
          this.nome = response.data.data.nome;
          this.sexo = response.data.data.sexo;
          this.idade = response.data.data.idade;
          this.datanascimento = response.data.data.datanascimento;
          this.hobby = response.data.data.hobby;
          
        })
        .catch(e => {
          console.log(e);
        });
    },
    updateDeveloper() {
      var dados = {
        nome: this.nome,
        sexo: this.sexo,
        idade: this.idade,
        datanascimento: this.datanascimento,
        hobby: this.hobby
      };

      DeveloperDataService.update(this.id, dados)
        .then(response => {
          this.flashMessage.success({
              title: 'Sucesso',
              message: response.data.data[0],
              time: 2000,
              flashMessageStyle: {
                  backgroundColor: 'linear-gradient(#e66465, #9198e5)'
              }
          });
         setTimeout(() => this.$router.push({ name: "developers" }), 2500);

        })
        .catch(e => {
          console.log(e);
        });
    },
    returnList(){
      this.$router.push({ name: "developers" });
    }
  },
  mounted() {
    this.message = '';
    this.getDeveloper(this.$route.params.id);
  }
};
</script>

