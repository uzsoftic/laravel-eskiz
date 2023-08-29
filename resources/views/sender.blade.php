@extends('vendor.laravel-eskiz.layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Eskiz SMS</a>
            </li>
            <li class="breadcrumb-item active">SMS Sender</li>
        </ol>
        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-comment"></i> SMS Sender
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('eskizsms.sender.action') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-3 col-md-4 col-5">
                                    <label for="area_code">Area Code</label>
                                    <select id="area_code" name="area_code" class="form-control">
                                        <option value="998" selected>+998</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-9 col-md-8 col-7">
                                    <label for="phone_number">Number</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                           placeholder="(90) 123 45 67" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="smsText">Message</label>
                                <textarea class="form-control" name="message" id="smsText"
                                          aria-describedby="helpMessage" cols="30" rows="10" required></textarea>
                                <small id="helpMessage" class="form-text text-muted">
                                    <b id="smsCount"></b> SMS (<b id="smsLength"></b>) Characters left. Total: <b id="smsTotal">0</b>
                                </small>

                            </div>

                            <div class="row justify-content-end">
                                <button type="submit" name="submit" value="true" class="btn btn-success m-1"><i
                                        class="fa fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        window.onload = function () {
            (function ($) {
                $.fn.smsArea = function (options) {

                    var
                        e = this,
                        cutStrLength = 0,

                        s = $.extend({

                            cut: true,
                            maxSmsNum: 8,
                            interval: 400,

                            counters: {
                                message: $('#smsCount'),
                                character: $('#smsLength'),
                                total: $('#smsTotal')
                            },

                            lengths: {
                                ascii: [160, 306, 459, 612, 765, 918, 1071, 1224],
                                unicode: [70, 134, 201, 268, 335, 402, 469, 536]
                            }
                        }, options);


                    e.keyup(function () {

                        clearTimeout(this.timeout);
                        this.timeout = setTimeout(function () {

                            var
                                smsType,
                                smsLength = 0,
                                smsCount = -1,
                                charsLeft = 0,
                                charsTotal = 0,
                                text = e.val(),
                                isUnicode = false;

                            for (var charPos = 0; charPos < text.length; charPos++) {
                                switch (text[charPos]) {
                                    case "\n":
                                    case "[":
                                    case "]":
                                    case "\\":
                                    case "^":
                                    case "{":
                                    case "}":
                                    case "|":
                                    case "€":
                                        smsLength += 2;
                                        break;

                                    default:
                                        smsLength += 1;
                                }

                                //!isUnicode && text.charCodeAt(charPos) > 127 && text[charPos] != "€" && (isUnicode = true)
                                if (text.charCodeAt(charPos) > 127 && text[charPos] != "€")
                                    isUnicode = true;
                            }

                            if (isUnicode) smsType = s.lengths.unicode;
                            else smsType = s.lengths.ascii;

                            for (var sCount = 0; sCount < s.maxSmsNum; sCount++) {

                                cutStrLength = smsType[sCount];
                                if (smsLength <= smsType[sCount]) {

                                    smsCount = sCount + 1;
                                    charsLeft = smsType[sCount] - smsLength;
                                    charsTotal = smsLength;
                                    break
                                }
                            }

                            if (s.cut) e.val(text.substring(0, cutStrLength));
                            smsCount == -1 && (smsCount = s.maxSmsNum, charsLeft = 0);

                            s.counters.message.html(smsCount);
                            s.counters.character.html(charsLeft);
                            s.counters.total.html(charsTotal);

                        }, s.interval)
                    }).keyup()
                }
            }(jQuery));

            $(function () {
                $('#smsText').smsArea({maxSmsNum: 8});
            })
        }

    </script>
@endsection
