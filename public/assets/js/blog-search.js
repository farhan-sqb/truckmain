$("#searchBlogs").searcher({
    itemSelector: ".singleBlogPost",
    textSelector: ".innerBlogContent",
    inputSelector: "#blogSearchInput",
    toggle: function(item, containsText) {
        if (containsText)
            $(item).fadeIn();
        else
            $(item).fadeOut();
    }
});