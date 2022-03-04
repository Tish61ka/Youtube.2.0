let like = document.getElementById('like');
        let dislike = document.getElementById('dislike');
        let like1 = 0;
        let dislike1 = 0
        function likeplus(e){
            like1++;
            if(dislike1 > 0){
                dislike1--;
            }
            like.innerHTML = like1;
            if(dislike1 >= 0){
                dislike.innerHTML = dislike1;
            }
        }
        function likeminus(){
            like1--;
            like.innerHTML = like1;
        }
        function dislikeminus(){
            dislike1--;
            dislike.innerHTML = dislike1;
        }
        function dislikeplus(e){
            dislike1++;
            if(like1 > 0){
                like1--;
            }
            dislike.innerHTML = dislike1;
            if(like1 >= 0){
                like.innerHTML = like1;
            }
        }