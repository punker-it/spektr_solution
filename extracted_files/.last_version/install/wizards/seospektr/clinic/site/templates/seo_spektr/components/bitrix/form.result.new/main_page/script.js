function ajaxForm(obForm, link) {
    
    BX.bind(obForm, 'submit', BX.proxy(function(e) {
        BX.PreventDefault(e);
        obForm.getElementsByClassName('error-msg')[0].innerHTML = '';
 
        let xhr = new XMLHttpRequest();
        xhr.open('POST', link);
 
        xhr.onload = function() {
            if (xhr.status != 200) {
                alert(`Ошибка ${xhr.status}: ${xhr.statusText}`);
            } else {
                
                var json = JSON.parse(xhr.responseText);
 
                if (! json.success) {
                    
                    for(let i =0;i<obForm.querySelectorAll('input[type="text"]').length;i++) {
                        obForm.querySelectorAll('input[type="text"]')[i].classList.remove('error');
                    }
                    if(obForm.querySelectorAll('textarea').length) {
                        obForm.querySelector('textarea').classList.remove('error');
                    }
                    
                    let errorStr = '';
                    for (let fieldKey in json.errors) {
                        errorStr += json.errors[fieldKey] + '<br>';
                        if(obForm.querySelector('input[data-name="'+fieldKey+'"]')) {
                            obForm.querySelector('input[data-name="'+fieldKey+'"]').classList.add('error');
                        } else if(obForm.querySelector('textarea[data-name="'+fieldKey+'"]')) {
                            obForm.querySelector('textarea[data-name="'+fieldKey+'"]').classList.add('error');
                        }
                        
                    }
                    
                    //json.errors
                    obForm.getElementsByClassName('error-msg')[0].innerHTML = errorStr;
                } else {
                    // Показываем сообщение об успешной отправке
                    for(let i=0;i<obForm.getElementsByTagName('input').length;i++) {
                        let input = obForm.getElementsByTagName('input')[i];
                        input.classList.remove('error');
                       if(obForm.querySelectorAll('textarea').length) {
                            obForm.querySelector('textarea').classList.remove('error');
                        }
                    }
                    obForm.getElementsByClassName('success-msg')[0].classList.add('visible');
                }
            }
        };
 
        xhr.onerror = function() {
            alert("Запрос не удался");
        };
 
        // Передаем все данные из формы
        xhr.send(new FormData(obForm));
    }, obForm, link));
}