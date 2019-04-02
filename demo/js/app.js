var client = algoliasearch('YourApplicationID', 'YourSearchAPIKey')
var players = client.initIndex('INDEX_NAME');

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
