
describe("A suite", function () {
    var service, rootScope;
    var data;
    beforeEach(function (done) {
        window.jasmine.DEFAULT_TIMEOUT_INTERVAL = 10000;
        setTimeout(function () {
            console.log('inside timeout');
            done();
        }, 500);
        window.ROOT_URL = 'http://localhost/kata-tdd-1-hoai_pham/src/';
        module('myApp');
        inject(function ($injector) {
            service = $injector.get('RequestService');
            rootScope = $injector.get('$rootScope');
        });
        rootScope.$digest();
        service.calculate("1,2,3").then(function(result) {
            data = result.data;
            done();
        });
        
    }); 
    it('should return a result', function (done) {  
        expect(data).toBeDefined();
        expect(data).toEqual('6');
        done();
    }); 
});
