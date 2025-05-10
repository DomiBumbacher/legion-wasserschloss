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
      if(panel.scrollHeight){
        panel.style.maxHeight = (panel.scrollHeight + 50) + 'px';
      }
      panel.style.marginTop = '0.3rem';
      panel.style.marginBottom = '0.3rem';
    }

    // After a delay because of the animation (scrollheight is updated after the animation)
    setTimeout(function () {
      // Reset parent style (calculate in the additional height of the second dropdown-menu)
      var parent = panel.parentElement;
      while (parent) {
        if (parent.classList.contains('dropdown-menu')) {
          if(parent.scrollHeight){
            parent.style.maxHeight = (parent.scrollHeight + 50) + 'px';
          }
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
