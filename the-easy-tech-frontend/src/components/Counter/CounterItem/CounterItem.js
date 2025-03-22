"use client";

import React, { useState, useEffect, useRef } from "react"
import { useInView } from "framer-motion"

const CounterItem = ({ title, number }) => {
    const ref = useRef(null)
    const isInView = useInView(ref, { once: true })
    const [count, setCount] = useState(0)

    useEffect(() => {
        if (isInView) {
          let start = 0;
          const duration = 2000
          const increment = number / (duration / 20)
    
          const counter = setInterval(() => {
            start += increment
            if (start >= number) {
              setCount(number)
              clearInterval(counter)
            } else {
              setCount(Math.ceil(start))
            }
          }, 20)
    
          return () => clearInterval(counter)
        }
      }, [isInView, number])

    return <div className='item' ref={ref}>
        <div className='flex flex-col items-center'>
            <div className='count-block flex items-center'>
                <div className='counter heading3'>{count}</div>
                <span className='heading3'>k</span>  
            </div>
            <div className='body1 text-secondary text-center'>{title}</div> 
        </div> 
    </div>
};

export default CounterItem;