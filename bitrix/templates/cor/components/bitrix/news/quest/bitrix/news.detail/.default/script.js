function getAdvokatThanks(lawyerID, page, questionId){

    let data = {'lawyerId': lawyerID, 'page':page, 'questionId':questionId};

    BX.ajax.runComponentAction('itg-soft:news.helper', 'getAdvokatInfo', {
        mode: 'class',
        data: data
    }).then(function (response) {
        if(response.status == 'success'){

            let responseData = response.data;
            let lawyerData = $('<div></div>');
            let lawyerStatistic = $('#lawyer-statistic');
            let isOnline = $('#is-online');
            let loading = $('.lawyer-card-loading');

            $.each(responseData.COUNTERS, function (key, value) {

                if(value[0] > 0){
                    
                    let fieldData = '';
    
                    if(key == 'COUNT_BLAGOD'){
                        fieldData = '<span class="js-statistic-thanks">'+ value[0] +'</span> ' + value[1] +'<br>' ;
                    }else{
                        fieldData = '<span>'+ value[0] +'</span> ' + value[1] +'<br>' ;
                    }
    
                    lawyerData.prepend(fieldData);
                }
            });

            loading.remove();

            if(responseData.IS_ONLINE){
                isOnline.html('сейчас на сайте');
            }

            lawyerStatistic.append(lawyerData);
        }
    });
}

function setThanksCount(){
    
    let bThanks = $('.js-statistic-thanks');
    let thanksVal = Number(bThanks.html());

    if(thanksVal){

        bThanks.empty();
        thanksVal++;
        bThanks.html(thanksVal);
    }
}