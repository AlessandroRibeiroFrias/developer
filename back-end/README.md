### Rotas
#### Developers
#### GET  `developers`
##### Retorna todos os developers cadastrados.

#### GET  `developers/{id_developer}`
##### Retorna developer de acordo com o id.

#### POST `developers`
##### Salva um novo Developer.
###### Campos a serem informados:
#

> nome: valor obrigatório, string(50).
> sexo: valor obrigatório, char(1).
> idade: valor opcional, se não informado, calculado através do campo datanascimento.
> hobby: valor obrigatório, string(100).
> data: valor obrigatório, date.
#
###### Exemplo Json:
#
```json
    {
        "nome": "Nome do desenvolvedor"
        , "sexo": "M"
        , "idade": "24"
        , "hobby": "Off - Road"
        , "datanascimento": "1996-12-17"
    }
```
#### PUT  `developers/{id_developer}`
##### Atualiza developer de acordo com o id.
###### Campos a serem informados: 
<br>
> nome: valor obrigatório, string(50). <br>
> sexo: valor obrigatório, char(1). <br>
> idade: valor opcional, se não informado, calculado atraves do campo datanascimento. <br>
> hobby: valor obrigatório, string(100). <br>
> data: valor obrigatório, date. <br>
###### Exemplo Json:
<br>
```json
    {
        "nome": "Nome do desenvolvedor"
        , "sexo": "M"
        , "idade": "24"
        , "hobby": "Off - Road"
        , "datanascimento": "1996-12-17"
    }
```

#### DELETE  `developers/{id_developer}`
##### Deleta um developer de acordo com o id.
