<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test Page Algolia By Lilian</title>
    <link rel="icon" type="image/svg" href="img/orange_logo.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/boosted.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<style>
.point{
  text-overflow: ellipsis !important;
  overflow : hidden;
  white-space : nowrap;
  width: 200px;
}

.spinner {
  margin: 100px auto 0;
  width: 70px;
  text-align: center;
}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}

#btnFilter{
  opacity:0;
  transition: opacity 2s ease-in-out;
}
#filter{
  opacity:1;
  transition: opacity 0.3s ease-in-out;
}

.close {
  position: absolute;
  right: 10px;
  top: 5px;
  width: 32px;
  height: 32px;
  opacity: 0.3;
}
.close:hover {
  opacity: 1;
}
.close:before, .close:after {
  position: absolute;
  left: 15px;
  content: ' ';
  height: 33px;
  width: 2px;
  background-color: #333;
}
.close:before {
  transform: rotate(45deg);
}
.close:after {
  transform: rotate(-45deg);
}

.rounded-pill{
  border-radius: 50rem !important;
}
.rounded-pill:hover{
  cursor: pointer;
}
.item{
  box-shadow: 5px 8px 6px -6px #777;
}
.item:hover{
  transform: scale(1.01, 1.01);
  -webkit-transform: scale(1.01, 1.01);
  transition-duration: 0.15s;
  transition-timing-function: ease-out;
  border: 1px solid #e0bbbb !important;
}

#hits{
  animation: anim 1s linear;
}

@keyframes anim {
  0%  {opacity:0;}
  100% {opacity:1;}
}

.alert:hover{
  transform: scale(1.01);
}
</style>
<body>
<!-- MENU -->
<header role="banner">
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="img/orange_logo.svg" alt="Back to homepage" title="Back to homepage"/></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsing-navbar" aria-controls="collapsing-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse justify-content-between collapse" id="collapsing-navbar">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#" aria-current="page">F.A.Q.</li>
                    <li class="nav-item"><a class="nav-link" href="../demo">Shop</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">My Orange</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Help</a></li>
                </ul>
                <ul class="navbar-nav text-white">
                    <li class="nav-item">
                        <a href="#" class="nav-link icon svg-search">
                            <span class="sr-only">open search bar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End Menu -->
<div class="container content">
    <div id="current-refined-values">
        <!-- CurrentRefinedValues widget will appear here -->
    </div>
    
    <div class="row">
      <div class=" form-group mx-auto mt-4 mb-5 col-md-6 d-inline-flex offset-md-3" id="aa-input-container">
        <label for="aa-search-input" class="mt-2 mr-1">Recherche : </label>
        <input type="search" class="form-control rounded mr-2 col-md-9" id="aa-search-input" placeholder="Recherche..." name="search" style="width:420px !important;">
      </div>
    </div>

    <div class="row">
      <div class="col-md-2">
      <button id="btnFiltre" type="button" class="btn btn-outline-info d-none">Filtre</button>    
      </div>
      <div id="suggestion" class="col-md-10"></div>
    </div>
    <div class="row">
      <div id="stats" class=" mt-1 col-md-3 offset-md-1">
          <!-- Stat widget will appear here -->
      </div>
    </div>

    <div id="hits" class="row pl-5 mt-2">
        <!-- Hits widget will appear here -->
    </div>
    
    <div id="pagination" class="mx-auto mt-1" style="width:500px;">
        <!-- Pagination widget will appear here -->
    </div>
</div> <!-- Fin container -->
<!-- Footer -->
<footer class="o-footer text-white" role="contentinfo" style="background-color:#000 !important;bottom:0;left:0;right:0;clear:both;">
    <h1 class="sr-only">footer - site map & informations</h1>
    <div class="o-footer-top">
        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item"><span class="nav-link">Follow us</span></li>
            </ul>
        </div>
    </div>
    <div class="o-footer-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h2>Discover</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="#">Unde omnis istea</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Natus error sit</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Voluptatem</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Totam rem aperiam</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h2>Shop</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="#">Natus error sit</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Unde omnis istea</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Voluptatem</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Doloremque</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Totam rem aperiam</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h2>Services</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="#">Doloremque</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Totam rem aperiam</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6">
                    <h2>Support</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="#">Doloremque</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Unde omnis istea</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Voluptatem</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Totam rem aperiam</a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item"><a class="nav-link text-white" href="#">Contact us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Locate a store</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Coverage map</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Business</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Child protection</a></li>
            </ul>
        </div>
    </div>
    <div class="o-footer-bottom">
        <div class="container-fluid">
            <ul class="nav">
                <li class="nav-item"><span class="nav-link text-white">© Orange 2018</span></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Jobs</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Advertise</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Terms & Conditions</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Privacy</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Cookies</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Access for all</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Safety online</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- All the library needed for UI and Algolia -->
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@3.0.0/dist/instantsearch.development.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="js/boosted.js"></script>
<script>
// Connection to Algolia server where is located your index 
const search = instantsearch({
  indexName: "INDEX_NAME",
  searchClient: algoliasearch('YourApplicationID', 'YourSearchAPIKey'),
  routing: true // This will change the URL consistent with some widgets's values
});


  // initialize pagination
  search.addWidget(
    instantsearch.widgets.pagination({
      container: '#pagination',
      maxPages: 10,
      scrollTo: 'header', // default is to scroll to 'header', here we enable this behavior
      showFirst: false,
      showLast: false,
      showPrevious: true,
      showNext: true,
      templates: {
        previous: '',
        next: '',
      },
      cssClasses: { // Add css class
        root: 'pagination justify-content-center',
        list: 'nav d-inline-flex',
        item: 'page-item text-dark',
        link: 'page-link mx-auto',
        selectedItem: 'active text-white',
        previous: 'page-item',
        next: 'page-item',
        disabledItem: 'disabled'
      }
    })
  );

// initialize hits
search.addWidget({
  render: function(opts) {
    const results = opts.results;
    document.querySelector('#hits').innerHTML = results.hits.map(function(h) { // read the hits from the results and transform them into HTML.
      return `
      <div class="col-md-12">
        <div class="alert border border-secondary rounded shadow">
          <h4>${h._highlightResult.title2[0].value}</h4>
          <p>${h._highlightResult.content.value}</p>
        </div>
      </div>
      `;
    }).join('');
  }
});


// initialize stats
search.addWidget(
  instantsearch.widgets.stats({
    container: "#stats",
    templates: {
      text: `
      {{#hasNoResults}}Aucun Résulat.{{/hasNoResults}}
      {{#hasOneResult}}1 résultat{{/hasOneResult}}
      {{#hasManyResults}}<span class="h5 text-primary">{{#helpers.formatNumber}}{{nbHits}}{{/helpers.formatNumber}}</span> résultats{{/hasManyResults}}
      pour « <span class="font-weight-bold">{{query}}</span> »
    `,
    },
    cssClasses: {
      text: 'text-secondary'
    }
  })
);


// initialize search box
search.addWidget({
  init: function(opts) {
    const helper = opts.helper;
    const input = document.querySelector('#aa-search-input');
    input.addEventListener('input', function(e) {
      helper.setQuery(e.currentTarget.value) // update the parameters
            .search(); // launch the query
    });
  }
});

search.start(); // Once you have added all the wanted widgets to call the start method to actually start the search.
</script>
</body>
</html>