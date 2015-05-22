<?php if(!defined('__BASE_DIR__')) exit('403');?>
<?php echo $app->script(array(
    'assets:js/Markdown.Converter.js',
    'assets:js/Markdown.Sanitizer.js',
    'assets:js/Markdown.Editor.js'
));?>
<div class="row-fluid wmd-panel">
    <span class="span5">
        <form action="<?php echo $app->baseUrl('/action/edit')?>" method="POST">
            <div id="wmd-button-bar"></div>
            <textarea name="content" placeholder="" class="span12 wmd-input" id="wmd-input"><?php echo $content;?></textarea>
            <input name="passwd" type="password" placeholder="请输入密码" />
            <input name="filename" type="hidden" value="<?php echo $filename;?>" />
            <button class="btn pull-right">提交</button>
        </form>
    </span>
    <span class="span7">
        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
    </span>
</div>
<script>
(function () {
    var converter1 = Markdown.getSanitizingConverter();
    converter1.hooks.chain("preBlockGamut", function (text, rbg) {
        return text.replace(/^ {0,3}""" *\n((?:.*?\n)+?) {0,3}""" *$/gm, function (whole, inner) {
            return "<blockquote>" + rbg(inner) + "</blockquote>\n";
        });
    });
    var editor1 = new Markdown.Editor(converter1);
    editor1.run();
})();
</script>
