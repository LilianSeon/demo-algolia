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
                    <li class="nav-item"><a class="nav-link" href="../demo2" aria-current="page">F.A.Q.</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">My Orange</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Help</a></li>
                    <li class="nav-item float-right"><a href="#" class="nav-link">Index : <?= $index1; ?></a></li>
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
      <div class=" form-group mx-auto mt-4 mb-5 col-md-6 d-inline-flex offset-md-1" id="aa-input-container">
        <label for="aa-search-input" class="mt-2 mr-1">Recherche : </label>
        <input type="search" class="form-control rounded mr-2 col-md-10" id="aa-search-input" placeholder="Recherche..." name="search" style="width:360px !important;">
      </div>
    </div>

    <div class="row">
      <div class="col-md-2">
      <button id="btnFiltre" type="button" class="btn btn-outline-info d-none">Filtre</button>    
      </div>
      <div id="suggestion" class="col-md-10"></div>
    </div>

    <div id="filter" role="tablist" class="row position-absolute bg-light rounded mt-4 accordion" style="left:40px;">
      <div class="col-md-12">
      <div id="close" class="close"></div>
        <div class="row position-absolute" style="left:40px;">
          <div id="sort-by"></div>
        </div>
        <div class="col-md-12">
          <div class="card multi mt-5">
            <div class="card-header" role="tab" id="headingOne-1">
              <h5 class="mb-0 pl-1">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" role="button" aria-expanded="true" aria-controls="collapseOne-1">
                Marque
              </a>
              </h5>
            </div>
            <div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne-1">
              <div class="card-body">
                <div id="brands" class=""></div>
              </div>
            </div>
          </div>
        </div>
            <div class="col-md-12">
          <div class="card multi mt-1">
            <div class="card-header" role="tab" id="headingOne-2">
              <h5 class="mb-0 pl-1">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2" role="button" aria-expanded="false" aria-controls="collapseOne-1">
                Nom
              </a>
              </h5>
            </div>
            <div id="collapseOne-2" class="collapse show" role="tabpanel" aria-labelledby="headingOne-2">
              <div class="card-body">
                <div id="title" class=""></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 mt-3">
          <div id="hits-per-page-selector"></div>
        </div>
        <div class="col-md-12">
          <div id="range-input" class="mt-3"></div>
        </div>
        <div class="col-md-12">
          <div id="clear-refinements" class="mt-3"></div>
        </div>
      </div>
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
<script src="https://cdn.jsdelivr.net/npm/algoliasearch@3.32.0/dist/algoliasearchLite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@3.0.0/dist/instantsearch.development.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="js/boosted.js"></script>
<script>

document.getElementById('close').onclick = function(){
  document.getElementById('filter').style.opacity = "0";
  document.getElementById('filter').addEventListener("transitionend", function(event) {
    document.getElementById('filter').classList.add('d-none');
    document.getElementById('btnFiltre').classList.remove('d-none');
    document.getElementById('btnFiltre').style.opacity = "1";
  })
};

document.getElementById('btnFiltre').onclick = function(){
  document.getElementById('filter').classList.remove('d-none');
  document.getElementById('filter').style.opacity = "1";
  document.getElementById('btnFiltre').classList.add('d-none');
  document.getElementById('btnFiltre').style.opacity = "0";
};


// Connection to Algolia server where is located your index 
const search = instantsearch({
  indexName: "INDEX_NAME",
  searchClient: algoliasearch('YourApplicationID', 'YourSearchAPIKey'),
  routing: true // This will change the URL consistent with some widgets's values
});

// initialize clearRefinement widget
search.addWidget(
  instantsearch.widgets.clearRefinements({
    container: '#clear-refinements',
    templates: {
      resetLabel: 'Vider les filtres'
    },
    cssClasses:{ // Add css classes
      root: 'mb-2',
      button: 'btn btn-secondary w-100',
      disabledButton: 'disabled'
    }
  })
);


  // initialize pagination widget
  search.addWidget(
    instantsearch.widgets.pagination({
      container: '#pagination',
      maxPages: 10,
      // default is to scroll to 'body', here we disable this behavior
      scrollTo: 'header',
      showFirst: false,
      showLast: false,
      showPrevious: true,
      showNext: true,
      templates: {
        previous: '',
        next: '',
      },
      cssClasses: {
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
  
// initialize Hits widget
search.addWidget({
  render: function(opts) {
    const results = opts.results;
    document.querySelector('#hits').innerHTML = results.hits.map(function(h) { // read the hits from the results and transform them into HTML.
        return '<div id="item'+h.idProduct+'" class="item col-md-3 col-sm-12 mb-4 border rounded  w-75" style="height:400px;padding-top:140px;"><div id="caps'+h.idProduct+'" style="height:400px;"><div id="loading'+h.idProduct+'" class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div><img src="'+h.productPictureUrl+'" class="card-img-top" onloadstart="loading('+h.idProduct+')" style="height:400px;object-fit: contain;" alt="'+h._highlightResult.title.value+'"><div class="card-body"><div class="text-muted">'+h.productBrand+'</div><hr style="border-top: 1px solid #999;"><h5 class="card-title">'+h._highlightResult.title.value+'</h5><p class="card-text"><div class="float-right text-primary font-weight-bold" style="font-size:27px;">'+h.price+'€</div></p><a href="'+h.objectID+'" class="btn btn-outline-secondary pb-1">Détail</a></div></div>';
    }).join('');
  }
});

// Display a loading image while the img of the product is loading
function loading(id){
  event.target.style.display = "none";
  event.target.addEventListener('load', function(){
    document.getElementById('caps'+id).style.display = 'none';
    document.getElementById('loading'+id).style.display = 'none';
    document.getElementById('item'+id).style.paddingTop = '0px';
    document.getElementById('item'+id).style.height = 'auto';
    event.target.style.display = "inline";
  });
}

// initialize Stats widget
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

// initialize RefinementList widget
search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#brands',
    attribute: 'productBrand',
    operator: 'or',
    limit: 10,
    templates: {
      searchableNoResults: 'Aucun Résulta'
    },
    cssClasses:{
      noResults: 'disabled',
      list: 'text-secondary nav flex-column mt-1 pl-1',
      count: 'border-bottom border-secondary text-secondary bg-light rounded-0'
    }
  })
);

search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#title',
    attribute: 'title',
    operator: 'or',
    limit: 10,
    templates: {
      searchableNoResults: 'Aucun Résulta'
    },
    cssClasses:{
      noResults: 'disabled',
      list: 'text-secondary nav flex-column mt-1 pl-1 point',
      item: 'pointItem',
      count: 'border-bottom border-secondary text-secondary bg-light rounded-0'
    }
  })
);


search.addWidget(
  instantsearch.widgets.refinementList({
    container: '#suggestion',
    attribute: 'productBrand',
    operator: 'or',
    limit: 10,
    cssClasses:{
      count: 'd-none',
      checkbox: 'd-none',
      list: [
        'd-inline-flex',
        'mb-4',
        'text-secondary',
        'nav'
        ],
      label: 'mb-0',
      item: 'mx-2 px-2 py-1 rounded-pill bg-light text-secondary',
      selectedItem: 'border border-dark'
    },
  })
);

// initialize Hits Per Page widget
search.addWidget(
  instantsearch.widgets.hitsPerPage({
    container: '#hits-per-page-selector',
    items: [
      {value: 8, label: '8 produits par page'},
      {value: 12, label: '12 produits par page', default: true},
      {value: 16, label: '16 produits par page'},
    ],
    cssClasses:{
      select: 'custom-select rounded'
    }
  })
);


// initialize Search Box
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

// Create the render function for the Range Slider widget
const renderRangeSlider = (renderOptions, isFirstRender) => {
  const { start, range, refine, widgetParams } = renderOptions;

  if (isFirstRender) {
    const input = document.createElement('input');
    input.type = 'range';
    input.classList.add('custom-range');

    input.addEventListener('change', event => {
      refine([parseFloat(event.currentTarget.value)]);
    });

    
    widgetParams.container.appendChild(input);

    return;
  }

  const input = widgetParams.container.querySelector('input');

  input.min = range.min;
  input.max = range.max;
  input.value = Number.isFinite(start[0]) ? start[0] : '0';

};

// Create the custom widget
const customRangeSider = instantsearch.connectors.connectRange(
  renderRangeSlider
);

// Instantiate the custom widget
search.addWidget(
  customRangeSider({
    container: document.querySelector('#range-input'),
    attribute: 'price',
  })
);
search.start(); // Once you have added all the wanted widgets to call the start method to actually start the search.

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
$('.collapse').collapse();
</script>
<script src="js/app.js"></script>
</body>
</html>