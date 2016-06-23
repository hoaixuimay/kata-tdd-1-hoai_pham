This is string calculator page
<div ng-controller="StringCalculatorCtrl">
    <label>Input string</label>
    <textarea rows="2" cols="50" id="inputString" name="inputString" ng-model="inputString"><?php echo !empty($this->inputString)?$this->inputString:""?></textarea>
    <label></label><input type="button" id="submitButton" value="Calculate" ng-click="calculate()"/> <br />
    <label for="resultCalculator">Result:</label><input id="resultCalculator" readonly="true" ng-model="outputString"/>
</div>
