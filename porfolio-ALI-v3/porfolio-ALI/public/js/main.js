// Menu mobile
(function () {
  var toggle = document.getElementById('navToggle');
  var links = document.getElementById('navLinks');
  if (toggle && links) {
    toggle.addEventListener('click', function () {
      var open = links.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    links.addEventListener('click', function (e) {
      if (e.target.tagName === 'A') links.classList.remove('open');
    });
  }
})();

// Recherche + filtre par module (pages TD / Mini Projets / Contrôles)
(function () {
  var grid = document.getElementById('cardsGrid');
  if (!grid) return;

  var cards = Array.prototype.slice.call(grid.querySelectorAll('.card'));
  var input = document.getElementById('searchInput');
  var buttons = document.querySelectorAll('.filter-btn');
  var emptyMsg = document.getElementById('emptyMsg');
  var current = 'all';

  function apply() {
    var q = input ? input.value.trim().toLowerCase() : '';
    var visible = 0;
    cards.forEach(function (card) {
      var okModule = current === 'all' || card.getAttribute('data-module') === current;
      var okSearch = q === '' || card.getAttribute('data-search').toLowerCase().indexOf(q) !== -1;
      var show = okModule && okSearch;
      card.hidden = !show;
      if (show) visible++;
    });
    if (emptyMsg) emptyMsg.hidden = visible !== 0;
  }

  if (input) input.addEventListener('input', apply);
  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      buttons.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      current = btn.getAttribute('data-filter');
      apply();
    });
  });
})();
