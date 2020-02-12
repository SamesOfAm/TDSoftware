<script>
    let articleContainer = document.getElementById('blog-articles');
    let articles = articleContainer.querySelectorAll('.layout_latest');
    let leftColumn = document.querySelector('.blog-left');
    let rightColumn = document.querySelector('.blog-right');
    for (let i=0;i<articles.length;i++) {
        articleContainer.removeChild(articles[i]);
        if (leftColumn.offsetHeight <= rightColumn.offsetHeight) {
            leftColumn.appendChild(articles[i]);
        } else {
            rightColumn.appendChild(articles[i]);
        }
    }
</script>