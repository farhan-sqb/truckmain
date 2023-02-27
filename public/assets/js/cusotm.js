// active class on highlighted anchor

// Add active class to the current button (highlight it)
var highlightAnchor = document.getElementById("highlightAnchor");
var links = highlightAnchor.getElementsByClassName("menuLink");
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}


// Mobile menu

const mobileMenu = document.getElementById("mobileMenu");

const mobileMenuClose = document.getElementById("mobileMenuClose");

const mobileMenuShow = document.getElementById("mobileMenuShow");

mobileMenuShow.addEventListener("click", () => {
  mobileMenu.style.left = "0px";
});


mobileMenuClose.addEventListener("click", () => {
  mobileMenu.style.left = "-300px"
});




var year = new Date().getFullYear();
$(".yearSpan").html(year);





const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];



function searchBlog() {
  var blogSearchInput = ($("#blogSearchInput").val()).trim();

  if (blogSearchInput == '') {
    blogSearchInput = 'all';
  }

  $.ajax({
    url: "/get-blog-" + blogSearchInput,
    success: function (result) {


      $("#searchBlogs").html('');


      for (let i = 0; i < result.length; i++) {
        let blogId = (result[i].id);
        let blogtitle = (result[i].blogtitle);
        let thumbnail = (result[i].thumbnail);
        let content = (result[i].content).slice(0, 200) + '...';
        let authorimage = (result[i].authorimage);
        let author = (result[i].author);

        var formattedDate = new Date((result[i].time));
        var d = formattedDate.getDate();
        if (d < 10) {
          d = '0' + d;
        }
        var m = monthNames[(formattedDate.getMonth())];
        var y = formattedDate.getFullYear();
        var time = (d + " " + m + " " + y);





        var data = '<div class="singleBlogPost">' +
          '<div>' +
          '<a class="innerBlogContent"' +
          'href="/blogs/' + blogId + '/' + blogtitle + '">' +
          '<div>' +
          '<img class="blogImage" src="' + thumbnail + '" alt="Blog image">' +
          '</div>' +
          '<div class="blogContent">' +
          '<div class="blogContentInner">' +
          '<h3 class="blogTitle">' + blogtitle +
          '</h3>' +
          '<p class="blogDes">' + content +
          '</p>' +
          '</div>' +
          '<div class="blogWritterBio mt-3">' +
          '<img src="' + authorimage + '" alt="Blog writer">' +
          '<div class="bioDetailsContent">' +
          '<p>' + author + '</p>' + time +
          '</div>' +
          '</div>' +
          '</div>' +
          '</a>' +
          '</div>' +
          '</div>';


        $("#searchBlogs").append(data);

      }

    }
  });
}