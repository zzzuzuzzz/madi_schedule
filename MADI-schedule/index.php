<?php

if (!$_COOKIE['user'] && $_COOKIE['profileStudent']) {
    header('Location: php/schedulePro/student/scheduleStudent.php');
} else if (!$_COOKIE['user'] && $_COOKIE['profileTeacher']) {
    header('Location: php/schedulePro/teacher/scheduleTeacher.php');
} else if ($_COOKIE['user'] && $_COOKIE['profileStudent']) {
    setcookie('user', '', -1, '/');
    header('Location: php/schedulePro/student/scheduleStudent.php');
} else if ($_COOKIE['user'] && $_COOKIE['profileTeacher']) {
    setcookie('user', '', -1, '/');
    header('Location: php/schedulePro/teacher/scheduleTeacher.php');
} else if ($_COOKIE['user'] && !$_COOKIE['profileStudent']) {
    header('Location: php/scheduleLite/schedule.php');
} else if ($_COOKIE['user'] && !$_COOKIE['profileTeacher']) {
    header('Location: php/scheduleLite/schedule.php');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашняя страница</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <div class="container">
        <form>
            <h3>Добро пожаловать!</h3>
            <label>
                <select name="select">
                    <option name="unvalue" value="unvalue" selected disabled>Выберете нужный варинат</option>
                    <option value="9401">1А1</option>
                    <option value="9405">1А2</option>
                    <option value="9402">1А3</option>
                    <option value="9403">1А4</option>
                    <option value="9404">1А5</option>
                    <option value="9218">1АМ </option>
                    <option value="9395">1бАС1</option>
                    <option value="9397">1бАС2</option>
                    <option value="9396">1бАС3</option>
                    <option value="9256">1бАСУ1</option>
                    <option value="9257">1бАСУ2</option>
                    <option value="9258">1бАСУ3</option>
                    <option value="9076">1бАЭ1</option>
                    <option value="9073">1бДВС</option>
                    <option value="9075">1бЗС</option>
                    <option value="9259">1бИТС1</option>
                    <option value="9260">1бИТС2</option>
                    <option value="9261">1бИТС3</option>
                    <option value="9097">1бЛ   1</option>
                    <option value="9098">1бЛ   2</option>
                    <option value="9105">1бЛМТ</option>
                    <option value="9102">1бМО  1</option>
                    <option value="9103">1бМО  2</option>
                    <option value="9262">1бОД1</option>
                    <option value="9263">1бОД2</option>
                    <option value="9400">1бПМ</option>
                    <option value="9217">1бСТ</option>
                    <option value="9155">1бСТР1</option>
                    <option value="9160">1бСТР2</option>
                    <option value="9159">1бСТР3</option>
                    <option value="9158">1бСТР4</option>
                    <option value="9157">1бСТР5</option>
                    <option value="9156">1бСТР6</option>
                    <option value="9161">1бСТР7</option>
                    <option value="9162">1бСТР8</option>
                    <option value="9215">1бТВ</option>
                    <option value="9398">1бТТ</option>
                    <option value="9464">1бУП  </option>
                    <option value="9104">1бУПР </option>
                    <option value="9264">1бУТП1</option>
                    <option value="9265">1бУТП2</option>
                    <option value="9214">1бЦУС</option>
                    <option value="9328">1бЭМТ </option>
                    <option value="9329">1бЭС  1</option>
                    <option value="9331">1бЭТ  </option>
                    <option value="9406">1ВА</option>
                    <option value="9268">1ВбАСУ</option>
                    <option value="9111">1ВбЛМТ</option>
                    <option value="9106">1ВбМО  </option>
                    <option value="9269">1ВбОД</option>
                    <option value="9270">1ВбУП  </option>
                    <option value="9332">1ВбЭС  </option>
                    <option value="9414">1ВмАТО</option>
                    <option value="9413">1ВмАУД</option>
                    <option value="9278">1ВмУП  </option>
                    <option value="9337">1ВмЭКР</option>
                    <option value="9112">1ВТД   </option>
                    <option value="9219">1ДМ   1</option>
                    <option value="9366">1КМ   1</option>
                    <option value="9367">1КМ   2</option>
                    <option value="9221">1мАЛС </option>
                    <option value="9411">1мАТО</option>
                    <option value="9410">1мАТТ</option>
                    <option value="9412">1мАТЭ</option>
                    <option value="9082">1мАЭ</option>
                    <option value="9271">1мБД</option>
                    <option value="9116">1мВД  </option>
                    <option value="9079">1мДВС</option>
                    <option value="9222">1мДМ  </option>
                    <option value="9358">1мЗС</option>
                    <option value="9408">1мИМ</option>
                    <option value="9113">1мЛ   </option>
                    <option value="9165">1мМ</option>
                    <option value="9166">1мМТС</option>
                    <option value="9272">1мОД  </option>
                    <option value="9167">1мПДУ1</option>
                    <option value="9479">1мПДУ2</option>
                    <option value="9223">1мПР  </option>
                    <option value="9163">1МС1</option>
                    <option value="9164">1МС2</option>
                    <option value="9170">1мСА</option>
                    <option value="9169">1мСД</option>
                    <option value="9224">1мСМ  </option>
                    <option value="9168">1мСТМ</option>
                    <option value="9371">1мТО</option>
                    <option value="9275">1мУП  </option>
                    <option value="9115">1мУПР </option>
                    <option value="9274">1мУТП</option>
                    <option value="9365">1мФД  </option>
                    <option value="9114">1мЦТС 1</option>
                    <option value="9480">1мЦТС 2</option>
                    <option value="9335">1мЭКР</option>
                    <option value="9216">1пДМ  </option>
                    <option value="9399">1пС   </option>
                    <option value="9107">1ТД   1</option>
                    <option value="9110">1ТД   2</option>
                    <option value="9109">1ТД   3</option>
                    <option value="9368">1ТК   1</option>
                    <option value="9369">1ТК   2</option>
                    <option value="9334">1ЭБО</option>
                    <option value="9421">2А1</option>
                    <option value="9422">2А2</option>
                    <option value="9423">2А3</option>
                    <option value="9425">2А4</option>
                    <option value="9424">2А5</option>
                    <option value="9230">2АМ   </option>
                    <option value="9466">2бАМТ1</option>
                    <option value="9467">2бАМТ2</option>
                    <option value="9415">2бАС1</option>
                    <option value="9417">2бАС2</option>
                    <option value="9416">2бАС3</option>
                    <option value="9279">2бАСУ1</option>
                    <option value="9280">2бАСУ2</option>
                    <option value="9085">2бАЭ1</option>
                    <option value="9086">2бАЭ2</option>
                    <option value="9372">2бГП</option>
                    <option value="9469">2бД1</option>
                    <option value="9473">2бД2</option>
                    <option value="9472">2бД3</option>
                    <option value="9471">2бД4</option>
                    <option value="9470">2бД5</option>
                    <option value="9083">2бДВС</option>
                    <option value="9084">2бЗС</option>
                    <option value="9282">2бИТС1</option>
                    <option value="9283">2бИТС2</option>
                    <option value="9284">2бИТС3</option>
                    <option value="9099">2бЛ   1</option>
                    <option value="9100">2бЛ   2</option>
                    <option value="9101">2бЛ   3</option>
                    <option value="9120">2бЛМТ</option>
                    <option value="9117">2бМО  1</option>
                    <option value="9118">2бМО  2</option>
                    <option value="9285">2бОД  1</option>
                    <option value="9286">2бОД  2</option>
                    <option value="9420">2бПМ</option>
                    <option value="9468">2бСА</option>
                    <option value="9229">2бСТ</option>
                    <option value="9171">2бСТР1</option>
                    <option value="9173">2бСТР2</option>
                    <option value="9176">2бСТР3</option>
                    <option value="9175">2бСТР4</option>
                    <option value="9174">2бСТР5</option>
                    <option value="9172">2бСТР6</option>
                    <option value="9177">2бСТР7</option>
                    <option value="9178">2бСТР8</option>
                    <option value="9227">2бТВ</option>
                    <option value="9418">2бТТ</option>
                    <option value="9287">2бУП  1</option>
                    <option value="9476">2бУП  2</option>
                    <option value="9119">2бУПР </option>
                    <option value="9289">2бУТП1</option>
                    <option value="9290">2бУТП2</option>
                    <option value="9226">2бЦУС</option>
                    <option value="9338">2бЭМТ </option>
                    <option value="9339">2бЭС  1</option>
                    <option value="9340">2бЭС  2</option>
                    <option value="9341">2бЭТ  </option>
                    <option value="9426">2ВА</option>
                    <option value="9465">2ВбИТС</option>
                    <option value="9121">2ВбМО  </option>
                    <option value="9292">2ВбОД  </option>
                    <option value="9293">2ВбУП  </option>
                    <option value="9342">2ВбЭС  </option>
                    <option value="9345">2ВмЭКР</option>
                    <option value="9126">2ВТД   </option>
                    <option value="9231">2ДМ   1</option>
                    <option value="9232">2ДМ   2</option>
                    <option value="9373">2КМ   1</option>
                    <option value="9375">2КМ   2</option>
                    <option value="9233">2мАЛС </option>
                    <option value="9431">2мАТО</option>
                    <option value="9430">2мАТТ</option>
                    <option value="9432">2мАТЭ</option>
                    <option value="9475">2мАУД</option>
                    <option value="9090">2мАЭ</option>
                    <option value="9294">2мБД1</option>
                    <option value="9296">2мБД2</option>
                    <option value="9130">2мВД  </option>
                    <option value="9378">2мГП  </option>
                    <option value="9087">2мДВС</option>
                    <option value="9234">2мДМ  </option>
                    <option value="9357">2мЗС</option>
                    <option value="9428">2мИМ</option>
                    <option value="9127">2мЛ   </option>
                    <option value="9181">2мМ</option>
                    <option value="9182">2мМТС</option>
                    <option value="9297">2мОД  </option>
                    <option value="9183">2мПДУ1</option>
                    <option value="9184">2мПДУ2</option>
                    <option value="9429">2мПМ</option>
                    <option value="9235">2мПР  </option>
                    <option value="9179">2МС1</option>
                    <option value="9180">2МС2</option>
                    <option value="9188">2мСА</option>
                    <option value="9186">2мСД1</option>
                    <option value="9187">2мСД2</option>
                    <option value="9236">2мСМ  </option>
                    <option value="9185">2мСТМ</option>
                    <option value="9237">2мТМ  </option>
                    <option value="9379">2мТО</option>
                    <option value="9298">2мТП</option>
                    <option value="9089">2мУГТ</option>
                    <option value="9300">2мУП</option>
                    <option value="9129">2мУПР</option>
                    <option value="9299">2мУТП</option>
                    <option value="9343">2мФД</option>
                    <option value="9128">2мЦТС</option>
                    <option value="9301">2мЧР</option>
                    <option value="9344">2мЭКР</option>
                    <option value="9228">2пДМ</option>
                    <option value="9419">2пС</option>
                    <option value="9122">2ТД1</option>
                    <option value="9123">2ТД2</option>
                    <option value="9124">2ТД3</option>
                    <option value="9125">2ТД4</option>
                    <option value="9376">2ТК1</option>
                    <option value="9377">2ТК2</option>
                    <option value="9439">3А1</option>
                    <option value="9440">3А2</option>
                    <option value="9441">3А3</option>
                    <option value="9242">3АМ</option>
                    <option value="9189">3бАМТ1</option>
                    <option value="9190">3бАМТ2</option>
                    <option value="9433">3бАС1</option>
                    <option value="9434">3бАС2</option>
                    <option value="9435">3бАС3</option>
                    <option value="9302">3бАСУ1</option>
                    <option value="9303">3бАСУ2</option>
                    <option value="9304">3бАСУ3</option>
                    <option value="9093">3бАЭ</option>
                    <option value="9191">3бД1</option>
                    <option value="9192">3бД2</option>
                    <option value="9193">3бД3</option>
                    <option value="9196">3бД4</option>
                    <option value="9195">3бД5</option>
                    <option value="9091">3бДВС</option>
                    <option value="9092">3бЗС</option>
                    <option value="9306">3бИТС1</option>
                    <option value="9307">3бИТС2</option>
                    <option value="9132">3бЛ1</option>
                    <option value="9131">3бЛ2</option>
                    <option value="9136">3бЛМТ</option>
                    <option value="9133">3бМО1</option>
                    <option value="9134">3бМО2</option>
                    <option value="9308">3бОД1</option>
                    <option value="9309">3бОД2</option>
                    <option value="9438">3бПМ</option>
                    <option value="9359">3бСА</option>
                    <option value="9241">3бСМ</option>
                    <option value="9239">3бТВ</option>
                    <option value="9436">3бТТ</option>
                    <option value="9310">3бУП</option>
                    <option value="9135">3бУПР</option>
                    <option value="9311">3бУТП1</option>
                    <option value="9312">3бУТП2</option>
                    <option value="9238">3бЦУС</option>
                    <option value="9346">3бЭМТ</option>
                    <option value="9347">3бЭС1</option>
                    <option value="9348">3бЭС2</option>
                    <option value="9349">3бЭТ</option>
                    <option value="9442">3ВА</option>
                    <option value="9313">3ВбАСУ</option>
                    <option value="9314">3ВбИТС</option>
                    <option value="9137">3ВбМО</option>
                    <option value="9315">3ВбУП</option>
                    <option value="9350">3ВбЭС</option>
                    <option value="9364">3ВмЭКР</option>
                    <option value="9243">3ДМ1</option>
                    <option value="9477">3ДМ2</option>
                    <option value="9380">3КМ1</option>
                    <option value="9381">3КМ2</option>
                    <option value="9197">3МС1</option>
                    <option value="9198">3МС2</option>
                    <option value="9240">3пДМ</option>
                    <option value="9462">3пС</option>
                    <option value="9138">3ТД1</option>
                    <option value="9141">3ТД2</option>
                    <option value="9140">3ТД3</option>
                    <option value="9139">3ТД4</option>
                    <option value="9382">3ТК1</option>
                    <option value="9448">4А1</option>
                    <option value="9449">4А2</option>
                    <option value="9450">4А3</option>
                    <option value="9249">4АМ1</option>
                    <option value="9199">4бАМТ1</option>
                    <option value="9443">4бАС1</option>
                    <option value="9444">4бАС2</option>
                    <option value="9316">4бАСУ1</option>
                    <option value="9317">4бАСУ2</option>
                    <option value="9096">4бАЭ</option>
                    <option value="9384">4бГП</option>
                    <option value="9201">4бД1</option>
                    <option value="9204">4бД2</option>
                    <option value="9203">4бД3</option>
                    <option value="9202">4бД4</option>
                    <option value="9094">4бДВС</option>
                    <option value="9095">4бЗС</option>
                    <option value="9318">4бИТС1</option>
                    <option value="9319">4бИТС2</option>
                    <option value="9142">4бЛ1</option>
                    <option value="9143">4бЛ2</option>
                    <option value="9144">4бМО</option>
                    <option value="9321">4бОД1</option>
                    <option value="9323">4бОП1</option>
                    <option value="9324">4бОП2</option>
                    <option value="9447">4бПМ</option>
                    <option value="9205">4бСА</option>
                    <option value="9248">4бСМ</option>
                    <option value="9246">4бТВ</option>
                    <option value="9325">4бУП</option>
                    <option value="9145">4бУПР </option>
                    <option value="9245">4бЦУС</option>
                    <option value="9352">4бЭМТ</option>
                    <option value="9353">4бЭС</option>
                    <option value="9354">4бЭТ</option>
                    <option value="9451">4ВА</option>
                    <option value="9326">4ВбАСУ</option>
                    <option value="9327">4ВбИТС</option>
                    <option value="9355">4ВбЭС</option>
                    <option value="9356">4ВбЭТ</option>
                    <option value="9251">4ДМ1</option>
                    <option value="9385">4КМ</option>
                    <option value="9206">4МС1</option>
                    <option value="9207">4МС2</option>
                    <option value="9247">4пДМ</option>
                    <option value="9463">4пС</option>
                    <option value="9146">4ТД1</option>
                    <option value="9150">4ТД2</option>
                    <option value="9149">4ТД3</option>
                    <option value="9148">4ТД4</option>
                    <option value="9147">4ТД5</option>
                    <option value="9386">4ТК</option>
                    <option value="9452">5А1</option>
                    <option value="9454">5А2</option>
                    <option value="9455">5А3</option>
                    <option value="9453">5А4</option>
                    <option value="9253">5АМ</option>
                    <option value="9457">5ВА</option>
                    <option value="9362">5ВбЭС</option>
                    <option value="9363">5ВбЭТ</option>
                    <option value="9254">5ДМ</option>
                    <option value="9387">5КМ1</option>
                    <option value="9389">5КМ2</option>
                    <option value="9208">5МС1</option>
                    <option value="9209">5МС2</option>
                    <option value="9210">5МС3</option>
                    <option value="9151">5ТД1</option>
                    <option value="9153">5ТД2</option>
                    <option value="9152">5ТД3</option>
                    <option value="9154">5ТД4</option>
                    <option value="9388">5ТК</option>
                    <option value="9255">6АМ</option>
                    <option value="9458">6ВА</option>
                    <option value="9390">6КМ1</option>
                    <option value="9391">6КМ2</option>
                    <option value="9392">6КМ3</option>
                    <option value="9212">6МС1</option>
                    <option value="9213">6МС2</option>
                    <option value="9393">6ТК1</option>
                    <option value="9394">6ТК2</option>
                </select>
            </label>
            <button type="submit" class="btnEnterToScheduleLite">Продолжить</button>
            <button type="button" class="btnEnterToAuth">Войти в свой аккаунт</button>
            <br>
            <p>
                У вас нет аккаунта? - <a href="php/auth/register.php">Зарегистрируйтесь!</a>
            </p>
            <p>
                <a href="php/info.php">Хотите узнать подробнее о нас?</a>
            </p>
            <p class="msg none">Lorem ipsum dolor sit amet.</p>
        </form>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>