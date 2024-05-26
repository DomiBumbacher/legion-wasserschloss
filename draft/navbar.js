var acc = document.getElementsByClassName('nav-accordion');
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener('click', function (e) {
    e.stopPropagation();

    var panel = getChildByClass(this, 'dropdown-menu');
    var toggle = getChildByClass(this, 'accordion-toggle');

    toggle.classList.toggle('active');

    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      panel.style.marginTop = null;
      panel.style.marginBottom = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + 'px';
      panel.style.marginTop = '1rem';
      panel.style.marginBottom = '1rem';
    }

    // After a delay because of the animation (scrollheight is updated after the animation)
    setTimeout(function () {
      // Reset parent style
      var parent = panel.parentElement;
      while (parent) {
        if (parent.classList.contains('dropdown-menu')) {
          parent.style.maxHeight = parent.scrollHeight + 'px';
        }
        parent = parent.parentElement;
      }
    }, 150);
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
