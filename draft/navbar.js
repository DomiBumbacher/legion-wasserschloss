var acc = document.getElementsByClassName('nav-accordion');
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener('click', function () {
    var panel = getChildByClass(this, 'dropdown-menu');
    var toggle = getChildByClass(this, 'accordion-toggle');

    toggle.classList.toggle('active');

    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + 'px';
    }
  });
}

function getChildByClass(elem, className) {
  var children = elem.childNodes;

  for (var i = 0; i < children.length; i++) {
    if (children[i].classList && children[i].classList.contains(className)) {
      return children[i];
    }
  }

  return undefined;
}
