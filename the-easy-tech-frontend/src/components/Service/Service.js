"use client"

import React, { useRef } from 'react'
import { useInView } from 'framer-motion'
import ServiceItem from './ServiceItem/ServiceItem'

const Service = ({services}) => {
    const ref = useRef(null)
    const isInView=useInView(ref,{once:true})

    return (
        <div>
            <section className='service-block lg:mt-[100px] sm:mt-16 mt-10 mb-6' ref={ref}>
                <div className='container'>
                    <h3 className='heading3 text-center'>Our Sevices</h3>
                    <div
                        style={{ 
                            transition:"all .7s cubic-bezier(.17,.55,.55,1) .3s",
                            transform:isInView ? "translateY(0px)" : "translateY(60px)",
                            opacity:isInView ? 1 : 0,
                        }} 
                        className='list-service grid lg:grid-cols-3 sm:grid-cols-2 gap-8 md:mt-10 mt-6 gap-y-10'
                    >
                        {
                            services.length > 0 && services.slice(0,6).map((service,i)=>{
                                return <ServiceItem key={i} {...{ isInView,service,i:i+1 }} />
                            })
                        }
                    </div>                 
                </div>
            </section>            
        </div>
    );
};

export default Service;