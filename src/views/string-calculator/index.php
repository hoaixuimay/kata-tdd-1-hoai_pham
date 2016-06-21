This is string calculator page
<form action="calculator" method="post">
    <label>Input string</label>
    <textarea rows="2" cols="50" name="inputString"><?php echo !empty($this->inputString)?$this->inputString:""?></textarea>
    <label></label><input type="submit" value="Calculate" /> <br />
    <label>Result:</label><label><?php echo $this->result;?></label>
</form>