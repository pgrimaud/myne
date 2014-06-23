# Myne
	
## API - Introduction

Cette API permet aux clients de récupérer des informations, reviews et commentaires sur leurs produits.

## REST

    API server : http://myne.api

L'API est principalement RESTful. Les données sont exposées sous la forme d'URI qui représentent des ressources et peuvent être récupérés via des clients HTTP (comme les navigateurs web) avec authentification.

## Authentification et type de données renvoyées

Pour accéder à une donnée il suffit simplement de passer dans l'entête HTTP votre token et le type content-type souhaité.

*Construction d'une requête authentifiée*

    GET Host+ /comments?id_review=1
    
    Host: myne.api
    
    X-Myne-Token: 6a52f85027a5477719d6c650ea3338fd
    Content-Type: application/json | application/xml 

## Requêtes products

Ces requêtes permettent de récupérer les produits du client.

*Example de requête products* 

    GET /products HTTP/1.1
    
    Content-Type: application/xml 
    Host: myne.api
    Date: Sun, 12 June 2014 16:59:24 GMT

*Fichier retourné (XML)*

    <products>
      <product>
        <SKU>1</SKU>
        <ean_code>12345678901233</ean_code>
        <name>Product YOLO</name>
      </product>
      <product>
        <SKU>2</SKU>
        <ean_code>12345678901233</ean_code>
        <name>Product TEST</name>
      </product>
    </products>

*Fichier retourné (JSON)*

    {"products":[{"SKU":"1","ean_code":"12345678901233","name":"Product YOLO"},{"SKU":"2","ean_code":"12345678901233","name":"Product TEST"}]}

## Requêtes product

Ces requêtes permettent de récupérer un produit spécifique du client.

*Example de requête product* 

    GET /product/1 HTTP/1.1
    
    Content-Type: application/xml 
    Host: myne.api
    Date: Sun, 12 June 2014 16:59:24 GMT

*Fichier retourné (XML)*

    
    <product>
      <SKU>1</SKU>
      <ean_code>12345678901233</ean_code>
      <name>Product YOLO</name>
    </product>

*Fichier retourné (JSON)*

    {"product":{"SKU":"1","ean_code":"12345678901233","name":"Product YOLO"}}

## Requêtes reviews

Ces requêtes permettent de récupérer les reviews d'un produit du client.

*Example de requête reviews* 

    GET /reviews?id_product=1 HTTP/1.1
    
    Content-Type: application/xml 
    Host: myne.api
    Date: Sun, 12 June 2014 16:59:24 GMT

*Fichier retourné (XML)*

    <reviews>
      <review>
        <id_review>1</id_review>
        <title>Ce produit est superbe!</title>
        <content>Super produit! (...)</content>
        <rate>10</rate>
        <date>2014-06-23 00:00:00</date>
        <id_facebook>123456789</id_facebook>
        <first_name>Pierre</first_name>
        <last_name>Grimaud</last_name>
      </review>
      <review>
        <id_review>2</id_review>
        <title>Déçu....</title>
        <content>Ce produit n'est pas super (...)</content>
        <rate>2</rate>
        <date>2014-06-23 00:00:00</date>
        <id_facebook>123456789</id_facebook>
        <first_name>Jerôme</first_name>
        <last_name>Duval</last_name>
      </review>
    </reviews>

*Fichier retourné (JSON)*

    {"reviews":[{"id_review":"1","title":"","content":"Super produit!","rate":"10","date":"2014-06-23 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"},{"id_review":"2","title":"","content":"Pue la merde","rate":"1","date":"2014-06-20 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}]}

## Requêtes review

Ces requêtes permettent de récupérer une review spécifique d'un produit du client.

*Example de requête review* 

    GET /review/1 HTTP/1.1
    
    Content-Type: application/xml 
    Host: myne.api
    Date: Sun, 12 June 2014 16:59:24 GMT

*Fichier retourné (XML)*
 
    <review>
      <id_review>1</id_review>
      <title>Ce produit est superbe!</title>
      <content>Super produit! (...)</content>
      <rate>10</rate>
      <date>2014-06-23 00:00:00</date>
      <id_facebook>123456789</id_facebook>
      <first_name>Pierre</first_name>
      <last_name>Grimaud</last_name>
    </review>

*Fichier retourné (JSON)*

    {"review":{"id_review":"1","title":"","content":"Super produit!","rate":"10","date":"2014-06-23 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}}

## Requêtes comments

Ces requêtes permettent de récupérer les commentaires d'une review d'un produit du client.

*Example de requête comments* 

    GET /comments?id_review=1 HTTP/1.1
    
    Content-Type: application/xml 
    Host: myne.api
    Date: Sun, 12 June 2014 16:59:24 GMT

*Fichier retourné (XML)*

    <comments>
      <comment>
        <id_comment>1</id_comment>
        <content>Je suis d'accord!</content>
        <date>2014-06-18 00:00:00</date>
        <id_facebook>123456789</id_facebook>
        <first_name>Paul</first_name>
        <last_name>Nhyou</last_name>
      </comment>
      <comment>
        <id_comment>2</id_comment>
        <content>Ouais! Trop bien!</content>
        <date>2014-06-18 00:00:00</date>
        <id_facebook>123456789</id_facebook>
        <first_name>Hervé</first_name>
        <last_name>Tran</last_name>
      </comment>
    </comments>

*Fichier retourné (JSON)*

    {"comments":[{"id_comment":"1","content":"Je suis d'accord!","date":"2014-06-18 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"},{"id_comment":"2","content":"Non, tu est nul.","date":"2014-06-10 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}]}


## Requêtes comment

Ces requêtes permettent de récupérer un commentaire d'une review d'un produit du client.

*Example de requête comment* 

    GET /comment/1 HTTP/1.1
    
    Content-Type: application/xml 
    Host: myne.api
    Date: Sun, 12 June 2014 16:59:24 GMT

*Fichier retourné (XML)*

    <comment>
      <id_comment>1</id_comment>
      <content>Je suis d'accord!</content>
      <date>2014-06-18 00:00:00</date>
      <id_facebook>123456789</id_facebook>
      <first_name>Paul</first_name>
      <last_name>Nhyou</last_name>
    </comment>

*Fichier retourné (JSON)*

    {"comment":{"id_comment":"1","content":"Je suis d'accord!","date":"2014-06-18 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}}
