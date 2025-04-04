

    <style>



        .fail-text{
            margin: 0;
            font-size: 1.5em;
            padding: 0;
            color:red;
        }

        .success-text {
            margin: 0;
            font-size: 1.5em;
            padding: 0;
            color: green;
            /*text-shadow: 0 0.1em 20px rgba(0, 0, 0, 1), 0.05em -0.03em 0 rgba(0, 0, 0, 1),
              0.05em 0.005em 0 rgba(0, 0, 0, 1), 0em 0.08em 0 rgba(0, 0, 0, 1),
              0.05em 0.08em 0 rgba(0, 0, 0, 1), 0px -0.03em 0 rgba(0, 0, 0, 1),
              -0.03em -0.03em 0 rgba(0, 0, 0, 1), -0.03em 0.08em 0 rgba(0, 0, 0, 1), -0.03em 0 0 rgba(0, 0, 0, 1);*/

        }

        p.success-text > span, p.fail-text > span{
            transform: scale(0.9);
            display: inline-block;
        }
        p.success-text > span:first-child, p.fail-text > span:first-child {
            animation: bop 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards infinite alternate;
        }



        @keyframes bop {
            0% {
                transform: scale(0.9);
            }
            50%,
            100% {
                transform: scale(1);
            }
        }

        @keyframes bopB {
            0% {
                transform: scale(0.9);
            }
            80%,
            100% {
                transform: scale(1.5) rotateZ(-3deg);
            }
        }


    </style>

    @if (session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <p class="success-text"><span>{{ session('success') }}</span></p>


          <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 200px; height: 200px;"><style>
           .line-heart1 {animation:line-heart1-pulse 2s infinite; transform-origin: 50px 50px;}
           @keyframes line-heart1-pulse{
               0% {transform: scale3d(1, 1, 1);}
               20% {transform: scale3d(.9, .9, .9);}
               35% {transform: scale3d(1, 1, 1);}
               50% {transform: scale3d(.9, .9, .9);}
               75% {transform: scale3d(1, 1, 1);}
               100% {transform: scale3d(1, 1, 1);}
           }
           @media (prefers-reduced-motion: reduce) {
               .line-heart1 {
                   animation: none;
               }
           }
          </style>

          <path class="line-heart1 stroke1 fill1" d="M48.1819 24.4658L48.182 24.4659L48.1821 24.466L48.9727 25.5905L49.799 24.492L49.7991 24.4919L49.7991 24.4918L49.7997 24.491L49.8034 24.4862L49.8196 24.4649C49.8343 24.4455 49.857 24.416 49.8872 24.3769C49.9476 24.2987 50.0383 24.1823 50.1572 24.0329C50.3951 23.734 50.7454 23.3031 51.1909 22.7807C52.0829 21.7347 53.3518 20.3275 54.86 18.8802C57.9232 15.9409 61.7981 13.0105 65.4225 12.3757C69.9542 11.5819 76.7167 12.4021 81.9639 15.7348C85.9753 18.2826 88.5888 21.3569 90.2121 24.9598C91.8428 28.5792 92.5 32.79 92.5 37.6407C92.5 42.2838 90.2513 47.1467 87.5986 51.2345C84.9613 55.2986 82.012 58.4644 80.7929 59.6835C70.6643 69.8121 54.2708 83.3102 49.6249 87.0957C49.2611 87.3922 48.7576 87.3889 48.3971 87.0871C43.8546 83.2839 28.0406 69.8642 18.7372 59.7149C18.5919 59.5565 18.4481 59.3996 18.3056 59.2443C14.5991 55.2024 11.8255 52.1779 9.93661 49.016C8.0088 45.789 7 42.4056 7 37.6407C7 32.7889 7.65223 28.5697 9.28036 24.9464C10.9009 21.3401 13.5134 18.2672 17.5328 15.7369C23.6572 11.8815 28.5473 11.5353 33.3269 12.3756C36.8219 12.99 40.5051 15.9039 43.4103 18.848C44.8388 20.2956 46.0352 21.7045 46.8748 22.7522C47.2941 23.2755 47.6232 23.7071 47.8464 24.0065C47.958 24.1562 48.0431 24.2727 48.0997 24.351C48.128 24.3901 48.1491 24.4197 48.1629 24.439L48.1781 24.4603L48.1814 24.465L48.1819 24.4658Z" fill="#fff" stroke="rgba(212,57,57,1)" stroke-width="3.8px" style="animation-duration: 2s;"></path></svg>



    </div>


@endif


@if (session('fail'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="fail-text"><span>{{ session('fail') }}</span></p>
    </div>
@endif


<script src="https://code.jquery.com/jquery.js"></script>
<script>

    $( 'div.alert.alert-success' ).delay( 3000 ).slideUp(3000);

    $( 'div.alert.alert-danger' ).delay( 3000 ).slideUp(3000);


</script>