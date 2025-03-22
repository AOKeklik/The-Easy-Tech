import React from 'react'
import SectionLeft from './SectionLeft/SectionLeft'
import SectionRight from './SectionRight/SectionRight'

const PaymentGatewayService = () => {
    return  <section className='payment-gateway-one style-second lg:mt-[100px] sm:mt-16 mt-10'>
        <div className='container'>
            <div className='content flex items-center gap-8'>
                <SectionLeft />
                <SectionRight />
            </div> 
        </div>
    </section>
};

export default PaymentGatewayService