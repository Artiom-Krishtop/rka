function getAdvokatThanks(lawyerID, page){

    let data = {'lawyerId': lawyerID, 'page': page}

    BX.ajax.runComponentAction('itg-soft:news.helper', 'getAdvokatInfo', {
        mode: 'class',
        data: data
    }).then(function (response) {
        if(response.status == 'success'){

            let responseData = response.data;
            let lawyerData = $('<div></div>');
            let lawyerCard = $('#lawyer-card');
            let loading = $('.lawyer-card-loading');

            $.each(responseData.COUNTERS, function (key, value) {

                if(value[0] > 0){
                    let fieldData = '<span>'+ value[0] +'</span> ' + value[1] +'<br>' ;
    
                    lawyerData.prepend(fieldData);
                }
            });

            loading.remove();

            if(responseData.IS_ONLINE){
                lawyerCard.append('<div class="online">сейчас на сайте</div>');
            }

            lawyerCard.append(lawyerData);
        }
    });
}