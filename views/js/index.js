const Index = {
    func: {
        init: function () {
            Index.func.getCommunity()
        },

        //接收社区数据
        getCommunity: function () {
            
            fetch('./community.php', {
                method: 'GET',
                model: 'cors',//允许发送跨域请求
                credentials: 'include'
            }).then(response => { return response.json() })
                .then(data => {
                    console.log(data);
                    //var seach = document.querySelector("#seach");
                    //seach.value = data.username+"123";

                    var community = document.querySelector("#community");

                    data.forEach(v => {
                        var htmlCard = `<div class="col">
                                        <div class="card card-item"  >
                                            <img src="http://gips3.baidu.com/it/u=3886271102,3123389489&fm=3028&app=3028&f=JPEG&fmt=auto?w=1280&h=960" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <p class="card-text">${v.username}</p>
                                            </div>
                                        </div>
                                    </div>`;
                        community.innerHTML += htmlCard;
                    });
                });
        }
    }

}