<?php add('header'); ?>

<!-- main content -->
<div id="contentwrapper">
  <div class="main_content">
    <div class="row-fluid">
      <div class="span12">
        <h3 class="heading">Aide API</h3>
      </div>
    </div>
    <article itemprop="mainContentOfPage" class="markdown-body entry-content">
      <p>Cette API permet aux clients de récupérer des informations, reviews et commentaires sur leurs produits.</p>

      <h2>
        <a aria-hidden="true" href="#rest" class="anchor" name="user-content-rest"><span class="octicon octicon-link"></span></a>REST</h2>

      <pre><code>API server : http://myne.api
</code></pre>

      <p>L'API est principalement RESTful. Les données sont exposées sous la forme d'URI qui représentent des ressources et peuvent être récupérés via des clients HTTP (comme les navigateurs web) avec authentification.</p>

      <h2>
        <a aria-hidden="true" href="#authentification-et-type-de-donn%C3%A9es-renvoy%C3%A9es" class="anchor" name="user-content-authentification-et-type-de-données-renvoyées"><span class="octicon octicon-link"></span></a>Authentification et type de données renvoyées</h2>

      <p>Pour accéder à une donnée il suffit simplement de passer dans l'entête HTTP votre token et le type content-type souhaité.</p>

      <p><em>Construction d'une requête authentifiée</em></p>

      <pre><code>GET Host+ /comments?id_review=1

Host: myne.api

X-Myne-Token: 6a52f85027a5477719d6c650ea3338fd
Content-Type: application/json | application/xml 
</code></pre>

      <h2>
        <a aria-hidden="true" href="#requ%C3%AAtes-products" class="anchor" name="user-content-requêtes-products"><span class="octicon octicon-link"></span></a>Requêtes products</h2>

      <p>Ces requêtes permettent de récupérer les produits du client.</p>

      <p><em>Example de requête products</em> </p>

      <pre><code>GET /products HTTP/1.1

Content-Type: application/xml 
Host: myne.api
Date: Sun, 12 June 2014 16:59:24 GMT
</code></pre>

      <p><em>Fichier retourné (XML)</em></p>

      <pre><code>&lt;products&gt;
  &lt;product&gt;
    &lt;SKU&gt;1&lt;/SKU&gt;
    &lt;ean_code&gt;12345678901233&lt;/ean_code&gt;
    &lt;name&gt;Product YOLO&lt;/name&gt;
  &lt;/product&gt;
  &lt;product&gt;
    &lt;SKU&gt;2&lt;/SKU&gt;
    &lt;ean_code&gt;12345678901233&lt;/ean_code&gt;
    &lt;name&gt;Product TEST&lt;/name&gt;
  &lt;/product&gt;
&lt;/products&gt;
</code></pre>

      <p><em>Fichier retourné (JSON)</em></p>

      <pre><code>{"products":[{"SKU":"1","ean_code":"12345678901233","name":"Product YOLO"},{"SKU":"2","ean_code":"12345678901233","name":"Product TEST"}]}
</code></pre>

      <h2>
        <a aria-hidden="true" href="#requ%C3%AAtes-product" class="anchor" name="user-content-requêtes-product"><span class="octicon octicon-link"></span></a>Requêtes product</h2>

      <p>Ces requêtes permettent de récupérer un produit spécifique du client.</p>

      <p><em>Example de requête product</em> </p>

      <pre><code>GET /product/1 HTTP/1.1

Content-Type: application/xml 
Host: myne.api
Date: Sun, 12 June 2014 16:59:24 GMT
</code></pre>

      <p><em>Fichier retourné (XML)</em></p>

      <pre><code>&lt;product&gt;
  &lt;SKU&gt;1&lt;/SKU&gt;
  &lt;ean_code&gt;12345678901233&lt;/ean_code&gt;
  &lt;name&gt;Product YOLO&lt;/name&gt;
&lt;/product&gt;
</code></pre>

      <p><em>Fichier retourné (JSON)</em></p>

      <pre><code>{"product":{"SKU":"1","ean_code":"12345678901233","name":"Product YOLO"}}
</code></pre>

      <h2>
        <a aria-hidden="true" href="#requ%C3%AAtes-reviews" class="anchor" name="user-content-requêtes-reviews"><span class="octicon octicon-link"></span></a>Requêtes reviews</h2>

      <p>Ces requêtes permettent de récupérer les reviews d'un produit du client.</p>

      <p><em>Example de requête reviews</em> </p>

      <pre><code>GET /reviews?id_product=1 HTTP/1.1

Content-Type: application/xml 
Host: myne.api
Date: Sun, 12 June 2014 16:59:24 GMT
</code></pre>

      <p><em>Fichier retourné (XML)</em></p>

      <pre><code>&lt;reviews&gt;
  &lt;review&gt;
    &lt;id_review&gt;1&lt;/id_review&gt;
    &lt;title&gt;Ce produit est superbe!&lt;/title&gt;
    &lt;content&gt;Super produit! (...)&lt;/content&gt;
    &lt;rate&gt;10&lt;/rate&gt;
    &lt;date&gt;2014-06-23 00:00:00&lt;/date&gt;
    &lt;id_facebook&gt;123456789&lt;/id_facebook&gt;
    &lt;first_name&gt;Pierre&lt;/first_name&gt;
    &lt;last_name&gt;Grimaud&lt;/last_name&gt;
  &lt;/review&gt;
  &lt;review&gt;
    &lt;id_review&gt;2&lt;/id_review&gt;
    &lt;title&gt;Déçu....&lt;/title&gt;
    &lt;content&gt;Ce produit n'est pas super (...)&lt;/content&gt;
    &lt;rate&gt;2&lt;/rate&gt;
    &lt;date&gt;2014-06-23 00:00:00&lt;/date&gt;
    &lt;id_facebook&gt;123456789&lt;/id_facebook&gt;
    &lt;first_name&gt;Jerôme&lt;/first_name&gt;
    &lt;last_name&gt;Duval&lt;/last_name&gt;
  &lt;/review&gt;
&lt;/reviews&gt;
</code></pre>

      <p><em>Fichier retourné (JSON)</em></p>

      <pre><code>{"reviews":[{"id_review":"1","title":"","content":"Super produit!","rate":"10","date":"2014-06-23 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"},{"id_review":"2","title":"","content":"Pue la merde","rate":"1","date":"2014-06-20 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}]}
</code></pre>

      <h2>
        <a aria-hidden="true" href="#requ%C3%AAtes-review" class="anchor" name="user-content-requêtes-review"><span class="octicon octicon-link"></span></a>Requêtes review</h2>

      <p>Ces requêtes permettent de récupérer une review spécifique d'un produit du client.</p>

      <p><em>Example de requête review</em> </p>

      <pre><code>GET /review/1 HTTP/1.1

Content-Type: application/xml 
Host: myne.api
Date: Sun, 12 June 2014 16:59:24 GMT
</code></pre>

      <p><em>Fichier retourné (XML)</em></p>

      <pre><code>&lt;review&gt;
  &lt;id_review&gt;1&lt;/id_review&gt;
  &lt;title&gt;Ce produit est superbe!&lt;/title&gt;
  &lt;content&gt;Super produit! (...)&lt;/content&gt;
  &lt;rate&gt;10&lt;/rate&gt;
  &lt;date&gt;2014-06-23 00:00:00&lt;/date&gt;
  &lt;id_facebook&gt;123456789&lt;/id_facebook&gt;
  &lt;first_name&gt;Pierre&lt;/first_name&gt;
  &lt;last_name&gt;Grimaud&lt;/last_name&gt;
&lt;/review&gt;
</code></pre>

      <p><em>Fichier retourné (JSON)</em></p>

      <pre><code>{"review":{"id_review":"1","title":"","content":"Super produit!","rate":"10","date":"2014-06-23 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}}
</code></pre>

      <h2>
        <a aria-hidden="true" href="#requ%C3%AAtes-comments" class="anchor" name="user-content-requêtes-comments"><span class="octicon octicon-link"></span></a>Requêtes comments</h2>

      <p>Ces requêtes permettent de récupérer les commentaires d'une review d'un produit du client.</p>

      <p><em>Example de requête comments</em> </p>

      <pre><code>GET /comments?id_review=1 HTTP/1.1

Content-Type: application/xml 
Host: myne.api
Date: Sun, 12 June 2014 16:59:24 GMT
</code></pre>

      <p><em>Fichier retourné (XML)</em></p>

      <pre><code>&lt;comments&gt;
  &lt;comment&gt;
    &lt;id_comment&gt;1&lt;/id_comment&gt;
    &lt;content&gt;Je suis d'accord!&lt;/content&gt;
    &lt;date&gt;2014-06-18 00:00:00&lt;/date&gt;
    &lt;id_facebook&gt;123456789&lt;/id_facebook&gt;
    &lt;first_name&gt;Paul&lt;/first_name&gt;
    &lt;last_name&gt;Nhyou&lt;/last_name&gt;
  &lt;/comment&gt;
  &lt;comment&gt;
    &lt;id_comment&gt;2&lt;/id_comment&gt;
    &lt;content&gt;Ouais! Trop bien!&lt;/content&gt;
    &lt;date&gt;2014-06-18 00:00:00&lt;/date&gt;
    &lt;id_facebook&gt;123456789&lt;/id_facebook&gt;
    &lt;first_name&gt;Hervé&lt;/first_name&gt;
    &lt;last_name&gt;Tran&lt;/last_name&gt;
  &lt;/comment&gt;
&lt;/comments&gt;
</code></pre>

      <p><em>Fichier retourné (JSON)</em></p>

      <pre><code>{"comments":[{"id_comment":"1","content":"Je suis d'accord!","date":"2014-06-18 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"},{"id_comment":"2","content":"Non, tu est nul.","date":"2014-06-10 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}]}
</code></pre>

      <h2>
        <a aria-hidden="true" href="#requ%C3%AAtes-comment" class="anchor" name="user-content-requêtes-comment"><span class="octicon octicon-link"></span></a>Requêtes comment</h2>

      <p>Ces requêtes permettent de récupérer un commentaire d'une review d'un produit du client.</p>

      <p><em>Example de requête comment</em> </p>

      <pre><code>GET /comment/1 HTTP/1.1

Content-Type: application/xml 
Host: myne.api
Date: Sun, 12 June 2014 16:59:24 GMT
</code></pre>

      <p><em>Fichier retourné (XML)</em></p>

      <pre><code>&lt;comment&gt;
  &lt;id_comment&gt;1&lt;/id_comment&gt;
  &lt;content&gt;Je suis d'accord!&lt;/content&gt;
  &lt;date&gt;2014-06-18 00:00:00&lt;/date&gt;
  &lt;id_facebook&gt;123456789&lt;/id_facebook&gt;
  &lt;first_name&gt;Paul&lt;/first_name&gt;
  &lt;last_name&gt;Nhyou&lt;/last_name&gt;
&lt;/comment&gt;
</code></pre>

      <p><em>Fichier retourné (JSON)</em></p>

      <pre><code>{"comment":{"id_comment":"1","content":"Je suis d'accord!","date":"2014-06-18 00:00:00","id_facebook":"123456789","first_name":"Pierre","last_name":"Grimaud"}}
</code></pre></article>
  </div>
</div>

<?php add('footer'); ?>