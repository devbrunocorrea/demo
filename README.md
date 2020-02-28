API Platform Demo
=================

This a demonstration application for the [API Platform Framework](https://api-platform.com).
Try it online at <https://demo.api-platform.com>.

Install
=======

    $ git clone https://github.com/api-platform/demo.git
    $ cd demo
    $ docker-compose up

And go to https://localhost.

Loading Fixtures
================

    $ docker-compose exec php bin/console hautelook:fixtures:load

Deploy on Kubernetes (GCP)
==========================

Everything is pre-configured. Edit the `ci/.env` file to set your project parameters, and declare the following secured
environment variables in your CI:

 * `PROJECT_ID`: GCP project id (i.e: `api-platform-demo-123456`)
 * `CI_SERVICE_ACCOUNT`: GCP service account
 * `CI_SERVICE_ACCOUNT_KEY`: GCP service account key
 * `CF_API_KEY`: Cloudflare API key
 * `CF_API_EMAIL`: Cloudflare email

**Important: do not check "_Display value in build log_" for security reason!**

Deployment will be done automatically by the CI.

exec:
=====
```
docker-compose down
docker-compose up -d
docker-compose exec php bin/console doctrine:schema:drop --force
docker-compose exec php bin/console doctrine:schema:create
docker-compose exec php bin/console hautelook:fixtures:load -vvv
dc exec php bin/console api:graphql:export
```

graphql-operations:
===================
```
query LER {
  collectionQueryBooks {
    edges {
      node {
        id
        title
      }
    }
  }
}

mutation CRIAR {
  createBook(input: {
    title: "TITULO DO LIVRO",
    description: "DESCRICAO DO LIVRO",
    author:"NOME DO AUTOR",
    publicationDate:"2020-02-28T00:00:00Z"
  }) {
    book {
      id
      title
    }
  }

}

mutation DELETAR {
  deleteBook(input: {
    id: "/books/011c42c5-b896-4b56-8114-32dafd716dc9"
  }) {
    clientMutationId
  }
}

mutation ATUALIZAR {
  updateBook(input: {
    id: "/books/04238665-3244-4d4a-8bed-81229ede6a88",
			title: "NOVO TITULO"
  }) {
    clientMutationId
  }
}
```
