$(document).ready(()=> {
  $("#prodCategory").on("change", ()=>{
    getProduct($("#prodCategory").val());
  })
  $("#usercont").hide();
}) 

function showUser(){
  $("#usercont").toggle(200);
  setInterval(()=>{
    $.ajax({
      url: "showUser.php",
      method: "POST",
      success:(data)=>{
        $("#usercont").html(data);
      }
    })
  }, 100)
}

function getProduct(value, search) {
  $.ajax({
    url: "getProduct.php",
    method: "POST",
    data:{
      category: value,
      search: search
    },
    success:(data)=>{
      $("#output").html(data); 
      addPagination();
    }
  })
}

function addPagination() {
  items = $(".row #selectable");
  itemCount = items.length;
  perPage = 6;
  items.slice(perPage).hide();
  $("#page-cont").pagination({
    items: itemCount,
    itemsOnPage: perPage,
    prevText: "<",
    nextText: ">",
    onPageClick: function (pageNumber) {
      showFrom = perPage * (pageNumber - 1);
      showTo = showFrom + perPage;
      items.hide().slice(showFrom, showTo).show();
    },
  });
}


function addToWish(file, name, price, id) {
  $.ajax({
      url: "addToWish.php",
      method: "POST",
      data: {
          file: file,
          name: name,
          price: price,
          id: id,
      },
      success: (data) => {
          if (data == 1) {
                Swal.fire({
                  title: "Successful!",
                  text: "Item successfully added to wishlist!",
                  showConfirmButton: false,
                  timer: 2000,
                  icon: "success"
              });
              $("#mywish-" + id).html("Remove from Wishlist");
              getProduct();
          }
          else if (data == 2) {
                Swal.fire({
                  title: "Successful!",
                  text: "Item successfully removed from wishlist!",
                  showConfirmButton: false,
                  timer: 2000,
                  icon: "success"
              });
              $("#mywish-" + id).html("Add to wishlist");
              getProduct();
          }
          else {
              alert(data);
          }
      }
  });
}

function autoSearch(){
  var availableTags = [
      "Starbucks Sticker Set",
      "Sportsball Sticker Set",
      "Corgi Sticker Set",
      "Plants Wall Painting",
      "Waves Wall Painting",
      "Leaves Wall Painting",
      "Aesthetic Journal", 
      "Cozy Journal", 
      "Garden  Journal", 
      "Rust Washi Tape",
      "Mint  Washi Tape",
      "Tangerine  Washi Tape",
      "Aran Merino Yarn",
      "Baby Alpaca Silk Yarn",
      "Alpaca Yarn",
      "Pink Flower Digital Paper",
      "Gray and Lilac Digital Paper",
      "Mint Arrow Digital Paper",
      "Heart Key Bottle Opener",
      "Gold Key Bottle Opener",
      "Crown Key Bottle Opener",
      "Stag Rubber Stamp",
      "Turtle Rubber Stamp",
      "Fox Rubber Stamp",
      "Miniature Coat",
      "Miniature Dress",
      "Miniature Overall",
      "Gather Wood Stained",
      "Farm Wood Stained",
      "Kitchen Wood Stained"
    ];
    $( "#txt" ).autocomplete({
      source: availableTags,
      select:(event, ui)=>{
          getProduct("search", ui.item.value);
      }
  });
}
