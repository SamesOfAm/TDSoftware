<ul id="job-list">
</ul>

<script>
    let jobList = document.getElementById('job-list');
    let request = new XMLHttpRequest();
    request.open('GET', 'https://tdsoftware.prescreen.io/job/list/zeebrjb67fc9oamo4766zth4iyb8qo2?format=json&max_results=8&lang=de', true);
    request.onload = function () {
        let data = JSON.parse(this.response);
        let jobs = data.jobs;
        let numberOfJobs = jobs.length;
        let openPositionsParagraph = document.getElementById('open-positions');
        openPositionsParagraph.innerHTML = numberOfJobs;

        jobs.forEach(function(job) {
            jobList.innerHTML += '<a data-lightbox="" class="iframe cboxElement" href="' + job.showUrl + '"><li><span>' + job.title + '</span><span>' + job.positionType.title + '</span></li></a>';
        });
        jQuery(function($) {
            $('a[data-lightbox]').map(function() {
                if($(this).hasClass('iframe')){
                    $(this).colorbox({
                        iframe:true,
                        width: "100%",
                        height: "80%",
                        maxWidth: '900px'
                    });
                } else {
                    $(this).colorbox({
                        // Put custom options here
                        loop: false,
                        rel: $(this).attr('data-lightbox'),
                        width: "95%",
                        height: "80%",
                        maxWidth: '95%',
                        maxHeight: '80%'
                    });
                }
            });
        });
    };
    request.send();
</script>