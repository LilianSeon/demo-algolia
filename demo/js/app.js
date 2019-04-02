var client = algoliasearch("UQ5V1RCRHZ", "625dc522ad32d77e986d35fc93081394")
var players = client.initIndex('shop_belgique_lilian');

autocomplete('#aa-search-input', {}, [
    {
      source: autocomplete.sources.hits(players, { hitsPerPage: 3 }),
      displayKey: 'title',
      templates: {
        header: '<div class="aa-suggestions-category">Téléphone</div>',
        suggestion: function(suggestion) {
          return '<span>' +
          suggestion._highlightResult.title.value + '</span><span>'
              + suggestion._highlightResult.productBrand.value + '</span>';
        }
      }
    }
]);
