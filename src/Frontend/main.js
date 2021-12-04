const carousel1 = document.querySelector('.carousel1');
const flkty1 = new Flickity( carousel1, {
      initialIndex: 1,
      wrapAround: true,
      groupCells: true
  
  });

flkty1.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
  let cellid= cellElement.getAttribute("data-tab");
let open = document.getElementById(`${cellid}`); 
  open.classList.remove('hide');
});

const carousel2 = document.querySelector('.carousel2');
const flkty2 = new Flickity( carousel2, {
      initialIndex: 1,
      wrapAround: true,
      groupCells: true
  
  });

flkty2.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
  let cellid= cellElement.getAttribute("data-tab");
let open = document.getElementById(`${cellid}`); 
  open.classList.remove('hide');
});

const carousel3 = document.querySelector('.carousel3');
const flkty3 = new Flickity( carousel3, {
      initialIndex: 1,
      wrapAround: true,
      groupCells: true
  
  });

flkty3.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
  let cellid= cellElement.getAttribute("data-tab");
let open = document.getElementById(`${cellid}`); 
  open.classList.remove('hide');
});

const carousel4 = document.querySelector('.carousel4');
const flkty4 = new Flickity( carousel4, {
      initialIndex: 1,
      wrapAround: true,
      groupCells: true
  
  });
flkty4.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
  let cellid= cellElement.getAttribute("data-tab");
let open = document.getElementById(`${cellid}`); 
  open.classList.remove('hide');
});

const carousel5 = document.querySelector('.carousel5');
const flkty5 = new Flickity( carousel5, {
      initialIndex: 1,
      wrapAround: true,
      groupCells: true
  
  });
flkty5.on( 'staticClick', function( event, pointer, cellElement, cellIndex ) {
  let cellid= cellElement.getAttribute("data-tab");
let open = document.getElementById(`${cellid}`); 
  open.classList.remove('hide');
});
  function popupClose(id) {
    let open = document.getElementById(`${id}`); 
    open.classList.add('hide');
}

  

