<div class="v-center jc-se vh-100">

    <section class="form-container">
        <form action="pages/gituser.php" method="get">
            <input name="username" type="text" placeholder="github username" required>
            <button name="send" value="ok" type="submit">Get it!</button>
        </form>
    </section>


    <?php
        function getGitUrl($username) {
            return "https://api.github.com/users/$username";
        }
        
        function getGitUserData($username) {

            $user_token = '';

            $authorization = "Authorization: Bearer $user_token";

            $curl = curl_init();
            curl_setopt_array(
                $curl,
                [
                    CURLOPT_HTTPHEADER => ['Content-Type: application/json', $authorization],
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_URL => getGitUrl($username),
                    CURLOPT_USERAGENT => 'Github Api',
                ]
            );
            $response = curl_exec($curl);
            curl_close($curl);
        
            return $response;
        }

        if (isset($_GET['username'])):
            $user = getGitUserData($_GET['username']);
            $userArr = json_decode($user, true);

            if (!isset($userArr['message'])):
    ?>

    <section class="users dflex fd-row jc-se al-cen">
        <div class="dflex jc-cen al-cen">
            <img class="user-image" src="<?=$userArr['avatar_url'];?>" alt="user-photo">
        </div>
        <div class="dflex fd-col jc-fstart al-cen">

            <div class="user-item dflex fd-row jc-fstart al-cen">
                <p>Nome:</p>
                <p><?=$userArr['name']?></p>
            </div>
            
            <div class="user-item dflex fd-row jc-fstart al-cen">
                <p>Git Link:</p>
                <a href="<?=$userArr['html_url']?>"><?=$userArr['html_url']?></a>
            </div>

            <div class="user-item dflex fd-row jc-fstart al-cen">
                <p>Blog:</p>
                <a href="<?=$userArr['blog']?>"><?=$userArr['blog']?></a>
            </div>

            <div class="user-item dflex fd-row jc-fstart al-cen">
                <p>Localização:</p>
                <p><?=$userArr['location']?></p>
            </div>

            <div class="user-item dflex fd-row jc-fstart al-cen">
                <p>Repositórios Públicos:</p>
                <p><?=$userArr['public_repos']?></p>
            </div>

            <div class="user-item dflex fd-row jc-fstart al-cen">
                <p>Membro desde:</p>
                <p><?=$userArr['created_at']?></p>
            </div>
            
        </div>
    </section>
</div>
<?php
        endif; 
    endif; ?>