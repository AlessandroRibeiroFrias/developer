### Rotas
#### Developers
#### GET  `developers`
##### Retorna todos os developers cadastrados.

#### GET  `developers/{id_developer}`
##### Retorna developer de acordo com o id.

#### POST `developers`
##### Salva um novo Developer.
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
