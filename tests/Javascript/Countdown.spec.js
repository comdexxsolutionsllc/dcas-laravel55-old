import { mount } from 'vue-test-utils';
import expect from 'expect';
import Countdown from '../../resources/assets/js/components/Countdown.vue';
import moment from 'moment';
import sinon from 'sinon';

describe ('Countdown', () => {
    let wrapper, clock;

    beforeEach (() => {
        clock = sinon.useFakeTimers();

        wrapper = mount(Countdown, {
            propsData: {
                until: moment().add(10, 'seconds')
            }
        });
    });

    afterEach(() => clock.restore());

    it('renders a countdown timer', () => {
        see('0 Days');
    });

    // Helper Functions

    let see = (text, selector) => {
        let wrap = selector ? wrapper.find(selector) : wrapper;

        expect(wrap.html()).toContain(text);
    };

    let type = (text, selector) => {
        let node = wrapper.find(selector);

        node.element.value = text;
        node.trigger('input');
    };

    let click = selector => {
        wrapper.find(selector).trigger('click');
    };

    let assertOnNextTick = (callback, done) => {
        wrapper.vm.nextTick(() => {
            try {
                callback();

                done();
            } catch (e) {
                done(e);
            }
        });
    };
});
