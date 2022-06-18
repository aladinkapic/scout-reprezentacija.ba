$(document).ready(function () {
    // ?filter%5B%5D=name&filter_values%5B%5D=Aladin&filter%5B%5D=sportRel.value&filter_values%5B%5D=fut&filter%5B%5D=positionRel.value&filter_values%5B%5D=gol&filter%5B%5D=height&filter_values%5B%5D=180&filter%5B%5D=strongerLimbRel.value&filter_values%5B%5D=lije&filter%5B%5D=genderRel.value&filter_values%5B%5D=m&filter%5B%5D=natTeamDataRel.countryRel.title&filter_values%5B%5D=b&filter%5B%5D=clubDataRel.clubRel.title&filter_values%5B%5D=f&limit=15

    $(".search-players").click(function () {
        let queryString = '?'; let counter = 0;

        $(".search-players-wrapper").find('input, select, textarea').each(function (){
            if($(this).val() !== '' && $(this).val() !== null){
                if(counter ++ !== 0) queryString += '&';
                queryString += "filter%5B%5D="+ $(this).attr('filter') +"&filter_values%5B%5D=" + $(this).val();
            }
            console.log(queryString);
        });

        queryString += '&limit=15';

        window.location = 'players' + queryString;
    });
});
