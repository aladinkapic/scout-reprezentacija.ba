@php
    $arr = array(1,2,3,4,5,6,7,8,9,10);
@endphp
<div class="container bootstrap snippets bootdey players-list">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>Ime i prezime</span></th>
                                <th><span>Ugovor</span></th>
                                <th>Datum rođenja</th>
                                <th>Država</th>
                                <th>Pozicija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arr as $a)
                                <tr>
                                    <td>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2c/20150331_2026_AUT_BIH_2177_Edin_D%C5%BEeko_%28cropped%29.jpg" alt="">
                                        <span class="user-link">Edin Džeko</span>
                                        <span class="user-subhead">FK Željezničar</span>
                                    </td>
                                    <td>4 godine</td>
                                    <td>17.03.1986</td>
                                    <td>
                                        Bosna i Hercegovina
                                    </td>
                                    <td>
                                        Prednji vezni
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>